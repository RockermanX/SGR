<?php
$cliente = new Cliente($_SESSION['id']);
$cliente->consultar();
$pe_pl = new Pedido_Plato();
$pe_pls = $pe_pl -> consultarPlatoVendido();
include 'presentacion/cliente/menuCliente.php';
?>
<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-secondary text-white">Platos Mas Vendidos</div>
				<div class="card-body">
					<div id="PlatoVendido" style="height: 300px;"></div>
                    <?php 
                        echo "<script>";
                        $json="[";
                        for ($i=0; $i<count($pe_pls); $i++) {
                            $json .= "[\"" . $pe_pls[$i][0] . " \", " . $pe_pls[$i][1] . "],";	    
                    	}
                    	$json .= "]";
                    	echo "new Chartkick.PieChart(\"PlatoVendido\", " . $json . ")";
                        echo "</script>";
                    ?>					
				</div>				
			</div>
		</div>
	</div>	
</div>