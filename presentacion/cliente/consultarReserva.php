<?php
$cliente = new Cliente($_SESSION['id']);
$cliente->consultar();
$reserva = new Reserva();
$reservas = $reserva->consultarTodos();
include 'presentacion/cliente/menuCliente.php';
?>
<div class="container mt-4">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
		<input id="Filtro" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		</div>
	</div>
</div>

<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div id="resultadosReserva">
			<div class="card">
					<div class="card-header bg-secondary text-white">Consultar Reserva</div>
					<div class="card-body">
						<div id="resultadosReserva">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Hora</th>
										<th scope="col">Fecha</th>
										<th scope="col">Cliente</th>
										<th scope="col">Mesa</th>
										<th scope="col">Recepcionista</th>
										<th scope="col">Estado</th>
										<th scope="col">Servicios</th>
									</tr>
								</thead>
								<tbody>
						<?php
						foreach ($reservas as $r) {
        echo "<tr>";
        echo "<td>" . $r-> getIdreserva() . "</td>";
        echo "<td>" . $r-> getHora() . "</td>";
        echo "<td>" . $r-> getFecha() . "</td>";
        echo "<td>" . $r-> getCliente() . "</td>";
        echo "<td>" . $r-> getMesa(). "</td>";
        echo "<td>" . $r-> getRecepcionista() . "</td>";
        echo "<td><div id=estado" . $r->getIdreserva() . "><span class='fas " . ($r->getEstado() == 0 ? "fa-times-circle" : "fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($r->getEstado() == 0 ? "Inhabilitado" : "Habilitado") . "' ></span>" . "</div></td>";
        echo "<td>" ."<a href='indexAjax.php?pid=". base64_encode("presentacion/modalReserva.php") . "&idReserva=" . $r->getIdreserva() . "' data-toggle='modal' data-target='#modalReserva' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span></a>";
        if($r -> getEstado()==1){
           echo "<a class='fas fa-cart-arrow-down' href='index.php?pid=" . base64_encode("presentacion/cliente/consultarPlato.php") . "&idReserva=" . $r-> getIdreserva()  . "' data-toggle='tooltip' data-placement='left' title='Agregar Pedido'> </a>";
        }
        "</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($reservas) . " registros encontrados</td></tr>"?>	
						</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#Filtro").keyup(function(){
	     var fil = $("#Filtro").val();
	     console.log(fil);
	     if(fil.length>=1){
		     <?php echo "var ruta = \"indexAjax.php?pid=". base64_encode("presentacion/cliente/consultarReservaAjax.php")."\";\n";?>
			 $("#resultadosReserva").load(ruta,{fil});
	     }else{
		     //$("#resultadosPaciente").html("<tbody><tr><td colspan='9'>0 registros encontrados</td></tr></tbody>");
	    	 $("#resultadosReserva").empty();
	     }
	
	});
});
</script>

<div class="modal fade" id="modalReserva" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>
