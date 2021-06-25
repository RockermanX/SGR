<?php
require_once 'logica/Persona.php';
require_once 'logica/Cliente.php';

$idCliente = $_GET['idCliente'];
$cliente = new Cliente($idCliente);
$cliente->consultar();
$reserva = new Reserva("", "", "", $idCliente, "" , "" , "");
$reservas= $reserva->consultarReservaCliente();

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
			<tr><th width="20%">Nombre</th><td><?php echo $cliente -> getNombre(); ?></td></tr>		
			<tr><th width="20%">Apellido</th><td><?php echo $cliente -> getApellido(); ?></td></tr>	
			<tr><th width="20%">Cedula</th><td><?php echo $cliente -> getCedula(); ?></td></tr>	
			<tr><th width="20%">Reservas</th><td>
			<table class="table table-striped table-hover">
								<thead class="thead-dark">
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Hora</th>
										<th scope="col">Fecha</th>
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
        echo "<td>" . $r-> getMesa(). "</td>";
        echo "<td>" . $r-> getRecepcionista() . "</td>";
        echo "<td><span class='fas " . ($r->getEstado() == 0 ? "fa-times-circle" : "fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($r->getEstado() == 0 ? "Inhabilitado" : "Habilitado") . "' ></span></td>";
        echo "</tr>";
    }
    ?>	
						</tbody>
							</table>
			
			</td></tr>
		</tbody>
	</table>
</div>