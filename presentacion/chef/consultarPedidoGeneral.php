<?php
$chef = new Chef($_SESSION['id']);
$chef->consultar();
if(isset($_GET['idPedido'])){
    $pedido = new Pedido($_GET['idPedido'],"",$chef->getId());
    $pedido -> actualizarChef();
}
$pedido = new Pedido();
$pedidos = $pedido->consultarTodos();
include 'presentacion/chef/menuChef.php';
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
			<div id="resultadosPedido">
			<div class="card">
					<div class="card-header bg-secondary text-white">Consultar Pedido</div>
					<div class="card-body">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Reserva</th>
										<th scope="col">Estado</th>
										<th scope="col">Seleccionar</th>
									</tr>
								</thead>
								<tbody>
						<?php
						foreach ($pedidos as $p) {
        echo "<tr>";
        echo "<td>" . $p-> getIdPedido() . "</td>";
        echo "<td>" . $p-> getReserva() . "</td>";
        echo "<td><span class='fas " . ($p->getEstado() == 0 ? "fa-times-circle" : "fa-check-circle") . "'   id='Estado" . $p->getIdPedido() . "'  data-toggle='tooltip'  class='tooltipLink' data-placement='left' data-original-title='" . ($p->getEstado() == 0 ? "Inhabilitado" : "Habilitado") . "' ></span></td>";
        echo "<td>" ."<a href='indexAjax.php?pid=". base64_encode("presentacion/modalPedido.php") . "&idPedido=" . $p->getIdPedido() . "' data-toggle='modal' data-target='#modalPedido' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>";
        if($p->getChef()==NULL){
            echo "<a class='fas fa-check-square' href='index.php?pid=" . base64_encode("presentacion/chef/consultarPedidoGeneral.php") . "&idPedido=" . $p->getIdPedido() . "' data-toggle='tooltip' data-placement='left' title='Seleccionar'> </a> ";
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($pedidos) . " registros encontrados</td></tr>"?>	
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
		     <?php echo "var ruta = \"indexAjax.php?pid=". base64_encode("presentacion/chef/consultarPedidoGeneralAjax.php")."\";\n";?>
			 $("#resultadosPedido").load(ruta,{fil});
	     }
	
	});
});
</script>
<div class="modal fade" id="modalPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
