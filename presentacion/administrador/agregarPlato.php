<?php
$exito = "";
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

if (isset($_POST["registrar"])) {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    // recibimos los datos de la imagen
    $nombre_foto = $_FILES['foto']['name'];
    $tipo_foto = $_FILES['foto']['type'];
    $tam_foto = $_FILES['foto']['size'];
    $ext = explode(".",$nombre_foto);
    $extension = end($ext);
    if ($tam_foto <= 300000) {
        if (strlen($nombre_foto) <= 45) {
            if ($tipo_foto == "image/png" || $tipo_foto == "image/jpeg" || $tipo_foto == "image/jpg") {
                // ruta de la carpeta destino en el servidor
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/restaurante/fotos/';
                $nombre_hora_imagen = date("jnYhis").".".$extension;
                // movemos la imagen de la carpeta temporal al directorio escogido
                move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_hora_imagen);

                $plato = new Plato( "", $nombre, $precio, $nombre_hora_imagen); // Crear el atributo foto en Paciente
                $plato->registrar();
            } else {
                $exito = "El tipo de la foto solo puede ser png,jpeg y jpg";
            }
        } else {
            $exito = "El nombre de de la
						foto es muy largo.";
        }
    } else {
        $exito = "El tamano de la
						foto es muy grande.";
    }
}
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container mt-4">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">

			<div class="card">

				<div class="card-header bg-secondary text-white">Registrar Plato</div>
				<div class="card-body">
				
						<?php
    if (isset($_POST["registrar"])) {
        ?>
        	<?php if($exito!=""){?>
        	<div class="alert alert-danger" role="alert"><?php echo $exito ?></div>
        	    
        	<?php }else{?>
        	    <div class="alert alert-success" role="alert">Plato Registrado exitosamente.</div>
        	<?php }?>		
						<?php } ?>
						
					<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/agregarPlato.php") ?>
						method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="precio" class="form-control"
								placeholder="Precio" required="required">
						</div>
						<div class="form-group">
							<input type="file" name="foto" size="30" class="form-control"
								placeholder="Foto" required="required">
						</div>
						<button type="submit" name="registrar" class="btn btn-secondary">Registrar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>
