<?php
require_once 'logica/Pedido.php';
require_once 'logica/Pedido_Plato.php';

$idPedido = $_GET['idPedido'];
$pedido = new Pedido($idPedido);
$pedido -> consultar();
$plato_pedido = new Pedido_Plato($idPedido);
$platos= $plato_pedido->consultarReservaPlato();

?>
<div class="modal-header">
	<h5 class="modal-title">Detalles Paciente</h5>
	<button type="button" class="close" data-dismiss="modal"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tbody>
			<tr><th width="20%">Id</th><td><?php echo $idPedido; ?></td></tr>		
			<tr><th width="20%">Reserva</th><td><?php echo $pedido -> getReserva(); ?></td></tr>	
			<tr><th width="20%">Estado</th><td><span class='fas <?php echo ($pedido->getEstado() == 0 ? "fa-times-circle" : "fa-check-circle") ?>' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='<?php echo ($pedido->getEstado() == 0 ? "Inhabilitado" : "Habilitado") ?>' ></span></td></tr>	
			<tr><th width="20%">Platos</th><td>
			<table class="table table-striped table-hover">
								<thead class="thead-dark">
									<tr>
										<th scope="col">Id Plato</th>
										<th scope="col">Cantidad</th>
										<th scope="col">Descripcion</th>
									</tr>
								</thead>
								<tbody>
						<?php
						foreach ($platos as $r) {
        echo "<tr>";
        echo "<td>" . $r-> getPlato() . "</td>";
        echo "<td>" . $r-> getCantidad() . "</td>";
        echo "<td>" . $r-> getDescripcion() . "</td>";
        echo "</tr>";
    }
    ?>	
						</tbody>
							</table>
			
			</td></tr>
		</tbody>
	</table>
</div>