<?php
/*require_once 'logica/Pedido.php';
require_once 'logica/Reserva.php';
require_once 'logica/Pedido_Plato.php';*/
require 'pdf/class.ezpdf.php';
$idPedido = $_GET['idPedido'];
$pe = new Pedido($idPedido );
$pe -> consultar();
$reserva = new Reserva($pe->getReserva());
$reserva -> consultar();
$cliente = new Cliente($reserva ->getCliente());
$cliente -> consultar();
$pedido_p = new Pedido_Plato($idPedido);
$pedidos_p = $pedido_p->consultarReservaPlato();
$total=0;
$precio=0;
foreach ($pedidos_p as $p_p){
    $plato = new Plato($p_p ->getPlato());
    $plato -> consultar();
    $precio = $p_p ->getCantidad()*$plato->getPrecio();
    $total = $total + $precio;
}
$factura = new Factura("",$total,$idPedido);
$factura -> registrar();
$pdf =new Cezpdf('a4');
$pdf->selectFont('pdf/fonts/courier.afm');
$pdf->ezText("<b>Factura Pedido</b>\n", 30, array("justification" => "center") );
$opciones = array('width' => '500');
$cols = array('id' => 'ID',
    'plato' => 'Plato' ,
    'precio' => 'Precio Unidad' ,
    'cantidad' => 'Cantidad',
    'descripcion' => 'Descripcion'  
);
$i=0;

foreach($pedidos_p as $pa){
    $plato = new Plato($p_p ->getPlato());
    $plato -> consultar();
    $datos[$i]=array(
        "id" => $idPedido,
        "plato" => $plato->getNombre(),
        "precio" => $plato->getPrecio(),
        "cantidad" => $pa->getCantidad(),
        "descripcion" => $pa->getDescripcion()
    );
    $i=$i+1;
}


$pdf->ezTable($datos,$cols,"",$opciones);
$pdf->ezText("\n\n",10);
$pdf->ezText("Total a pagar:".$total,20);
$pdf->ezText("Cliente: ".$cliente->getNombre()." ".$cliente->getApellido(),15);
$pdf->ezText("\n",10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);

ob_end_clean();
$pdf->ezStream();