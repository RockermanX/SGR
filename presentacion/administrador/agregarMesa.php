<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$error = -1;
if (isset($_POST["registrar"])) {
    $nombre = $_POST["nombre"];
    switch($_POST['Numero'])
    {
        case 1:
            $numero = 2;
            break;
        case 2:
            $numero = 4;
            break;
        case 3:
            $numero = 8;
            break;
        case 4:
            $numero = 12;
            break;
        default:
            //No se selecciono ningun valor
            break;
    }
    $mesa = new Mesa("", $nombre, $numero);
    $mesa->registrar();
    $error=1;
}
include 'presentacion/administrador/menuAdministrador.php';
?>
<div class="container my-4">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-secondary text-white">Registro Mesa</div>
				<div class="card-body">
						<?php if($error==1){?>
						<div class="alert alert-success" role="alert">Mesa Agregada exitosamente.</div>						
						<?php } ?>
						<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/agregarMesa.php")?>
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required">
						</div>
						<div>
						<label>Ingrese Numero de Personas</label>
						<select name="Numero">
                        <option value="1">2</option>
                        <option value="2">4</option>
                         <option value="3">8</option>
                        <option value="4">12</option>
                        </select>
						</div>
						<button type="submit" name="registrar" class="btn btn-secondary">Registrar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>

