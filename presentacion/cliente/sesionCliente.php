<?php
$cliente = new Cliente($_SESSION['id']);
$cliente->consultar();
include 'presentacion/cliente/menuCliente.php';
?>
<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-dark text-white">Bienvenido Cliente</div>
				<div class="card-body">
					<p>Usuario: <?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?></p>
					<p>Correo: <?php echo $cliente -> getCorreo(); ?></p>
					<p>Hoy es: <?php echo date("d-M-Y"); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>


