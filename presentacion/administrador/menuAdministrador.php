<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/sesionAdministrador.php")?>">
		<i class="fas fa-utensils"></i></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
				href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Consultar </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultarCliente.php")?>">Cliente</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultarChef.php")?>">Chef</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultarRecepcionista.php")?>">Recepcionista</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultarReserva.php")?>">Reserva</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultarMesa.php")?>">Mesa</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultarPlato.php")?>">Plato</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultarGraficos.php")?>">Graficos</a>
				</div></li>
				
			<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
				href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Agregar </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/agregarChef.php")?>">Chef</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/agregarRecepcionista.php")?>">Recepcionista</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/agregarMesa.php")?>">Mesa</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/agregarPlato.php")?>">Plato</a>
				</div></li>
			<li class="nav-item"><a class="nav-link" href="index.php">Salida</a>
			</li>
		</ul>
		<span class="navbar-text">
                        Administrador: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?>
    </span>
	</div>
</nav>