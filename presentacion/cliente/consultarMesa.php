<?php
$cliente = new Cliente($_SESSION['id']);
$cliente->consultar();
$mesa = new Mesa();
$mesas = $mesa->consultarTodos();
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
			<div id="resultadosMesa">
				<div class="card">
					<div class="card-header bg-secondary text-white">Seleccionar Mesa Reserva</div>
					<div class="card-body">
						<div id="resultadosPacientes">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Nombre</th>
										<th scope="col">Numero de Personas</th>
										<th scope="col">Reserve !ya!</th>
									</tr>
								</thead>
								<tbody>
						<?php
    foreach ($mesas as $m) {
        echo "<tr>";
        echo "<td>" . $m->getIdmesa() . "</td>";
        echo "<td>" . $m->getNombre() . "</td>";
        echo "<td>" . $m->getNpersonas() . "</td>";
        echo "<td>" ."<a class='fas fa-cart-arrow-down' href='index.php?pid=" . base64_encode("presentacion/cliente/agregarReserva.php") . "&idmesa=" . $m->getIdmesa() . "' data-toggle='tooltip' data-placement='left' title='Reservar'> </a></td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($mesas) . " registros encontrados</td></tr>"?>	
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
		     <?php echo "var ruta = \"indexAjax.php?pid=". base64_encode("presentacion/cliente/consultarMesaAjax.php")."\";\n";?>
			 $("#resultadosMesa").load(ruta,{fil});
	     }else{
		     //$("#resultadosPaciente").html("<tbody><tr><td colspan='9'>0 registros encontrados</td></tr></tbody>");
	    	 $("#resultadosMesa").empty();
	     }
	
	});
});
</script>