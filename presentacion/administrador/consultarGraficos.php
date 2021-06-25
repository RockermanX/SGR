<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$reserva = new Reserva();
$reserva1 = new Reserva();
$reservas = $reserva -> consultarReserva();
$reservas1 = $reserva1 -> consultarDia();
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-secondary text-white">Reservas del Restaurante</div>
				<div class="card-body">
					<div id="ReservasR" style="height: 300px;"></div>
                    <?php 
                        echo "<script>";
                        $json1="{";
                        for ($i=0; $i<count($reservas); $i++) {
                            $json1 .= "\"".$reservas[$i][0] . "\" : " . $reservas[$i][1] . ",";	    
                    	}
                    	$json1 .= "}";
                    	echo "new Chartkick.LineChart(\"ReservasR\", " . $json1 . ")";
                        echo "</script>";
                    ?>					
				</div>				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-secondary text-white">Reservas por Dia</div>
				<div class="card-body">
					<div id="ReservasDia" style="height: 300px;"></div>
                    <?php 
                        echo "<script>";
                        $json2="[";
                        for ($i=0; $i<count($reservas1); $i++) {
                            $json2 .= "[\"".$reservas1[$i][0] . "\", " . $reservas1[$i][1] . "],";	    
                    	}
                    	$json2 .= "]";
                    	echo "new Chartkick.ColumnChart(\"ReservasDia\", " . $json2 . ")";
                        echo "</script>";
                    ?>					
				</div>				
			</div>
		</div>
	</div>		
</div>
