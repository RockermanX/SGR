<?php
$cliente = new Cliente($_SESSION['id']);
$cliente->consultar();
$plato = new Plato();
$platos = $plato ->consultarTodos();
$i=0;
$con=0;
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

<div class="container">
	<div id="resultadosPlato">
			<?php 
			foreach ($platos as $p){
			   if($i==0){
			       echo  "<div class='row mt-4'>";
			   }
			   echo  "<div class='col-4'>";
			   echo  "<div class='card' style='width: 18rem;'>";
			   echo  "<img class='card-img-top' src=". (($p->getFoto() != "") ? "'/restaurante/fotos/" . $p->getFoto() . "'" : "") ." alt='Card image cap'>";
			   echo  "<div class='card-body'>";
			   echo  "<h5 class='card-title'>". $p->getNombre()."</h5>";
			   echo  "<p  class='card-text'>Precio: $ ". $p -> getPrecio() ."</p>";
			   echo  "<a href='index.php?pid=" . base64_encode("presentacion/cliente/agregarPedido.php") . "&idPlato=" . $p->getIdplato() . "&idReserva=". $_GET['idReserva']."' class='btn btn-secondary'> <i class='fas fa-cart-arrow-down'></i> Comprar</a>";
			   echo  "</div>";
			   echo  "</div>";
			   echo  "</div>";
			   if($i==2){
			       $i=0;
			       echo  "</div>";
			   }else{
			       $i=$i+1;
			   }
			   if(count($platos)==$con+1){
			       echo  "</div>";
			   }
			   $con=$con+1;
			  
			}			
			?>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#Filtro").keyup(function(){
	     var fil = $("#Filtro").val();
	     console.log(fil);
	     if(fil.length>=1){
		     <?php echo "var ruta = \"indexAjax.php?pid=". base64_encode("presentacion/cliente/consultarPlatoAjax.php")."&idReserva=". $_GET['idReserva']."\";\n";?>
			 $("#resultadosPlato").load(ruta,{fil});
	     }else{
		     //$("#resultadosPaciente").html("<tbody><tr><td colspan='9'>0 registros encontrados</td></tr></tbody>");
	    	 $("#resultadosPlato").empty();
	     }
	
	});
});
</script>

<!-- <table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Nombre</th>
										<th scope="col">Precio</th>
										<th scope="col">Foto</th>
										<th scope="col">Agregar Plato al Carrito</th>
									</tr>
								</thead>
								<tbody>
						<?php
   /* foreach ($platos as $p) {
        echo "<tr>";
        echo "<td>" . $p->getIdplato() . "</td>";
        echo "<td>" . $p->getNombre() . "</td>";
        echo "<td>" . $p->getPrecio() . "</td>";
        echo "<td>" . (($p->getFoto() != "") ? "<img src='/restaurante/fotos/" . $p->getFoto() . "' height='50px'>" : "") . "</td>";
        echo "<td>" ."<a class='fas fa-cart-arrow-down' href='index.php?pid=" . base64_encode("presentacion/cliente/agregarPedido.php") . "&idPlato=" . $p->getIdplato() . "&idReserva=". $_GET['idReserva']."' data-toggle='tooltip' data-placement='left' title='Reservar'> </a></td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($platos) . " registros encontrados</td></tr>"*/?>	
						</tbody>
							</table>-->