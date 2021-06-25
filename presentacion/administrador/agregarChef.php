<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

$error = -1;
$nombre = "";
$apellido = "";
$correo = "";
$clave = "";
$tarjetaprofesional = "";

if(isset($_POST["registrar"])){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $tarjetaprofesional = $_POST["tarjetaprofesional"];
    
    $chef = new Chef("", $nombre, $apellido, $correo, $clave, $tarjetaprofesional);
    if(!$chef -> existeCorreo()){
        $chef -> registrar();
        $error = 0;
    }else{
        $error = 1;
    }
}

include 'presentacion/administrador/menuAdministrador.php';
?>



<div class="container mt-4">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-secondary text-white">Registrar Chef</div>
				<div class="card-body">
						<?php
    if ($error == 0) {
        ?>
						<div class="alert alert-success" role="alert">Chef registrado
						exitosamente.</div>
						<?php } else if($error == 1) { ?>
						<div class="alert alert-danger" role="alert">
							El correo <?php echo $correo; ?> ya existe
						</div>
						<?php } ?>
						<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/agregarChef.php") ?>
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="apellido" class="form-control"
								placeholder="Apellido" required="required">
						</div>
						<div class="form-group">
							<input type="email" name="correo" class="form-control"
								placeholder="Correo" required="required">
						</div>
						<div class="form-group">
							<input type="password" name="clave" class="form-control"
								placeholder="Clave" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="tarjetaprofesional" class="form-control"
								placeholder="Tarjetaprofesional" required="required">
						</div>
						<button type="submit" name="registrar" class="btn btn-secondary">Registrar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>

