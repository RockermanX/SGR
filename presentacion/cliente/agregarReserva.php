<?php
$cliente = new Cliente($_SESSION['id']);
$cliente->consultar();
$error = -1;
if (isset($_POST["registrar"])) {
        $fecha = $_POST["fecha"];
        switch($_POST['Hora']){
            case 1:
                $hora = "16:00:00";
                break;
            case 2:
                $hora = "17:00:00";
                break;
            case 3:
                $hora = "18:00:00";
                break;
            case 4:
                $hora = "19:00:00";
                break;
            case 5:
                $hora = "20:00:00";
                break;
            case 6:
                $hora = "21:00:00";
                break;
            default:
                break;
        }
      $recepcionista = new Recepcionista();
      $recepcionista-> SeleccionarRecepcionista();
      $reserva = new Reserva("", $hora, $fecha, $_SESSION['id'] , $_GET['idmesa'] , $recepcionista -> getId());
      if($reserva->ValidarReserva()){
          $error = 0;
          $reserva->registrar();
         }else{
        $error=1;
    }
}
include 'presentacion/cliente/menuCliente.php';
?>
<div class="container my-4">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-secondary text-white">Agregar Reserva</div>
				<div class="card-body">
						<?php if ($error == 0) { ?>
						<div class="alert alert-success" role="alert">Reserva Agregada exitosamente.</div>						
						<?php } else if($error == 1) { ?>
						<div class="alert alert-danger" role="alert">
							Esta mesa ya esta reservada para esta fecha y hora
						</div>
						<?php } ?>
						<form action=<?php echo "index.php?pid=" . base64_encode("presentacion/cliente/agregarReserva.php")."&idmesa=".$_GET["idmesa"] ?> 
						method="post">
						<div>
						<label>Ingrese Fecha de la Reserva</label>
						<input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" value=<?php $hoy=date("Y-m-d"); echo $hoy;?> required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> />
						</div>
						<div>
						<label>Ingrese Hora de la Reserva<br></label>
						<select name="Hora">
                        <option value="1">16:00</option>
                        <option value="2">17:00</option>
                        <option value="3">18:00</option>
                        <option value="4">19:00</option>
                        <option value="5">20:00</option>
                        <option value="6">21:00</option>
                        </select>
						</div>
						<button type="submit" name="registrar" class="btn btn-secondary">Registrar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>


