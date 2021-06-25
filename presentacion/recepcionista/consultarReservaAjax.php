<?php
$reserva = new Reserva();
$reservas = $reserva->buscarReserva($_REQUEST["fil"]);
?>
<div class="card">
	<div class="card-header bg-secondary text-white">Consultar Reserva</div>
	<div class="card-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Hora</th>
					<th scope="col">Fecha</th>
					<th scope="col">Cliente</th>
					<th scope="col">Mesa</th>
					<th scope="col">Recepcionista</th>
					<th scope="col">Estado</th>
				</tr>
			</thead>
			<tbody>
						<?php
						foreach ($reservas as $r) {
						    echo "<tr>";
						    echo "<td>" . $r-> getIdreserva() . "</td>";
						    echo "<td>" . $r-> getHora() . "</td>";
						    echo "<td>" . $r-> getFecha() . "</td>";
						    echo "<td>" . $r-> getCliente() . "</td>";
						    echo "<td>" . $r-> getMesa(). "</td>";
						    echo "<td>" . $r-> getRecepcionista() . "</td>";
						    echo "<td><div id=estado" . $r->getIdreserva() . "><span class='fas " . ($r->getEstado() == 0 ? "fa-times-circle" : "fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($r->getEstado() == 0 ? "Inhabilitado" : "Habilitado") . "' ></span>" . "</div></td>";
						    echo "<td>" . " <a id='cambiarEstado" . $r->getIdreserva() . "' class='fas fa-power-off' href='#' data-toggle='tooltip' data-placement='left' title='" . ($r->getEstado() == 0 ? "Habilitar" : "Inhabilitar") . "'> </a>
                                                   </td>";
						    echo "</tr>";
						}
    echo "<tr><td colspan='9'>" . count($reservas) . " registros encontrados</td></tr>"?>	
						</tbody>
		</table>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	<?php foreach ($reservas as $r) { ?>
	$("#cambiarEstado<?php echo $r -> getIdreserva(); ?>").click(function(){
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/recepcionista/editarEstadoReservaAjax.php") . "&idReserva=" . $r -> getIdreserva() . "&estado=" . (($r -> getEstado() == 0)?"1":"0") ."\";\n"; ?>
		$("#estado<?php echo $r -> getIdreserva(); ?>").load(ruta);
	});
	<?php } ?>
});
</script>
