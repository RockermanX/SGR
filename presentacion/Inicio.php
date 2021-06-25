
<div class="container">
	<div class="row">
		<?php include 'encabezado.php';?>
	</div>
	<div class="row">
			<div class="col-4 mt-4">
				<div class="card">
					<div class="card-body">
						<h1 class="text-center">Inicie Sesion</h1>
						<p class="text-center">Reserve su mesa !ya!</p>
						<div>
							<form action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&nos=true" method="post">
							<div class="form-group">
							    <label>Correo:</label>
								<input type="email" name="correo" class="form-control" placeholder="Correo" required="required">
							</div>
							<div class="form-group">
								<label>Password:</label>
								
								<input type="password" name="clave" class="form-control" placeholder="Clave" required="required">
							</div>
							<button type="submit" class="btn btn-secondary">Autenticar</button>
						</form>
						<a href=<?php echo "index.php?pid=" . base64_encode("presentacion/registro.php") . "&nos=true" ?>>Registrese Gratis</a>	
						</div>
					</div>
				</div>
			</div>
			<div class="col-8 mt-4">
				<img src="img/inicio.jpg" width="100%" height="100%">
			</div>
	</div>
</div>