<?php
$plato = new Plato();
$platos = $plato->buscarPlato($_REQUEST["fil"]);
$i=0;
$con=0;
?>


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


