<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-dark text-white">Bienvenido Administrador</div>
				<div class="card-body">
					<p>Usuario: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?></p>
					<p>Correo: <?php echo $administrador -> getCorreo(); ?></p>
					<p>Hoy es: <?php echo date("d-M-Y"); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>