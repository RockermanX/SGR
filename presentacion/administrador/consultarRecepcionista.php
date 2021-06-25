<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$recepcionista = new Recepcionista();
$recepcionistas = $recepcionista ->consultarTodos();
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
			<div id="resultadosRecepcionista">
			<div class="card">
					<div class="card-header bg-secondary text-white">Consultar Recepcionista</div>
					<div class="card-body">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Nombre</th>
										<th scope="col">Apellido</th>
										<th scope="col">Correo</th>
									</tr>
								</thead>
								<tbody>
						<?php
						foreach ($recepcionistas as $r) {
        echo "<tr>";
        echo "<td>" . $r->getId() . "</td>";
        echo "<td>" . $r->getNombre() . "</td>";
        echo "<td>" . $r->getApellido() . "</td>";
        echo "<td>" . $r->getCorreo() . "</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($recepcionistas) . " registros encontrados</td></tr>"?>	
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
		     <?php echo "var ruta = \"indexAjax.php?pid=". base64_encode("presentacion/administrador/consultarRecepcionistaAjax.php")."\";\n";?>
			 $("#resultadosRecepcionista").load(ruta,{fil});
	     }
	
	});
});
</script>
