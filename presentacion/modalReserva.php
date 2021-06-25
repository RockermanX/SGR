<?php
require_once 'logica/Reserva.php';

$idReserva = $_GET['idReserva'];
$reserva = new Reserva($idReserva);
$reserva->consultar();

?>
<div class="modal-header">
	<h5 class="modal-title">Detalles Reserva</h5>
	<button type="button" class="close" data-dismiss="modal"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tbody>
			<tr><th width="20%">Id</th><td><?php echo $reserva -> getIdreserva(); ?></td></tr>		
			<tr><th width="20%">Fecha</th><td><?php echo $reserva -> getFecha(); ?></td></tr>
			<tr><th width="20%">Hora</th><td><?php echo $reserva -> getHora(); ?></td></tr>
			<tr><th width="20%">Cliente</th><td><?php echo $reserva -> getCliente(); ?></td></tr>
			<tr><th width="20%">Recepcionista</th><td><?php echo $reserva -> getRecepcionista(); ?></td></tr>		
		</tbody>
	</table>
</div>