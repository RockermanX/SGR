<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$chef = new Chef();
$chefs = $chef->consultarTodos();
include 'presentacion/administrador/menuAdministrador.php';
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
			<div id="resultadosChef">
				<div class="card">
					<div class="card-header bg-secondary text-white">Consultar Chef</div>
					<div class="card-body">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Nombre</th>
										<th scope="col">Apellido</th>
										<th scope="col">Correo</th>
										<th scope="col">Tarjeta Profesional</th>
									</tr>
								</thead>
								<tbody>
						<?php
    foreach ($chefs as $c) {
        echo "<tr>";
        echo "<td>" . $c->getId() . "</td>";
        echo "<td>" . $c->getNombre() . "</td>";
        echo "<td>" . $c->getApellido() . "</td>";
        echo "<td>" . $c->getCorreo() . "</td>";
        echo "<td>" . $c->getTarjetaP(). "</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($chefs) . " registros encontrados</td></tr>"?>	
						</tbody>
							</table>
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
		     <?php echo "var ruta = \"indexAjax.php?pid=". base64_encode("presentacion/administrador/consultarChefAjax.php")."\";\n";?>
			 $("#resultadosChef").load(ruta,{fil});
	     }
	
	});
});
</script>