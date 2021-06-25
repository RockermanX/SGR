<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$plato = new Plato();
$platos = $plato ->consultarTodos();
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
			<div id="resultadosPlato">
			<div class="card">
					<div class="card-header bg-secondary text-white">Consultar Plato</div>
					<div class="card-body">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Nombre</th>
										<th scope="col">Precio</th>
										<th scope="col">Fotos</th>
									</tr>
								</thead>
								<tbody>
						<?php
    foreach ($platos as $p) {
        echo "<tr>";
        echo "<td>" . $p->getIdplato() . "</td>";
        echo "<td>" . $p->getNombre() . "</td>";
        echo "<td>" . $p->getPrecio() . "</td>";
        echo "<td>" . (($p->getFoto() != "") ? "<img src='/restaurante/fotos/" . $p->getFoto() . "' height='50px'>" : "") . "</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($platos) . " registros encontrados</td></tr>"?>	
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
		     <?php echo "var ruta = \"indexAjax.php?pid=". base64_encode("presentacion/administrador/consultarPlatoAjax.php")."\";\n";?>
			 $("#resultadosPlato").load(ruta,{fil});
	     }
	
	});
});
</script>