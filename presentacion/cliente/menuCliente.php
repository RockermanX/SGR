<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand"
		href="index.php?pid=<?php echo base64_encode("presentacion/sesionCliente.php")?>"><i class="fas fa-utensils"></i></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item"><a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarMesa.php")?>">Reservar</a></li>
			<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
				href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Consultar </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarReserva.php")?>">Reserva</a> 
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarPedido.php")?>">Pedido</a> 
				</div></li>
			<li class="nav-item"><a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/carritoReserva.php")?>"><i class="fas fa-cart-arrow-down"></i> Carrito</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarGraficos.php")?>">Acerca del Restaurante</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php">Salida</a>
			</li>
		</ul>
		<span class="navbar-text">
      Cliente: <?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?> 
    </span>
	</div>
</nav>