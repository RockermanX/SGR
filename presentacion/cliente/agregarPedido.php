<?php
$cliente = new Cliente($_SESSION['id']);
$cliente->consultar();
$plato = new Plato($_GET['idPlato']);
$plato -> consultar();
include 'presentacion/cliente/menuCliente.php';
?>
<div class="container my-4">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-secondary text-white">Agregar Al Carrito</div>
				<div class="card-body">
						<?php if (isset($_POST["agregar"])) { ?>
						<div class="alert alert-success" role="alert">Carrito exitosamente.</div>						
						<?php } ?>
						<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/cliente/carritoReserva.php")."&idPlato=" . $_GET['idPlato'] . "&idReserva=". $_GET['idReserva'] ?>  method="post">
						<div class="form-group">
						<img class='card-img-top' src=<?php echo (($plato->getFoto() != "") ? "'/restaurante/fotos/" . $plato->getFoto() . "' width='200'  height='200'" : "") ?> >
						</div>
						<div class="form-group">
						<label>Plato: <?php echo $plato -> getNombre();?></label>
						</div>
						<div class="form-group">
							<input type="text" name="cantidad" class="form-control" placeholder="Cantidad" required="required"">
						</div>
						<div class="form-group">
							<input type="text" name="descripcion" class="form-control" placeholder="Descripcion" required="required"">
						</div>
						<button type="submit" name="registrar" class="btn btn-secondary">Agregar Al Carrito</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>
