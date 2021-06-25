<?php
$recepcionista = new Recepcionista($_SESSION['id']);
$recepcionista->consultar();
include 'presentacion/recepcionista/menuRecepcionista.php';
?>
<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-dark text-white">Bienvenido Recepcionista</div>

				<div class="card-body">
					<p>Usuario: <?php echo $recepcionista -> getNombre() . " " . $recepcionista -> getApellido() ?></p>
					<p>Correo: <?php echo $recepcionista -> getCorreo(); ?></p>
					<p>Hoy es: <?php echo date("d-M-Y"); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
