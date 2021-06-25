<?php
if(isset($_GET['idPedido'])){
    $pedido = new Pedido($_GET['idPedido'],"",$chef->getId());
    $pedido -> actualizarChef();
}
$pedido = new Pedido();
$pedidos = $pedido->buscarPedido($_REQUEST["fil"]);
?>
<div class="card">
	<div class="card-header bg-secondary text-white">Consultar Pedido</div>
	<div class="card-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Reserva</th>
					<th scope="col">Estado</th>
					<th scope="col">Servicio</th>
				</tr>
			</thead>
			<tbody>
						<?php
						foreach ($pedidos as $p) {
						    echo "<tr>";
						    echo "<td>" . $p-> getIdPedido() . "</td>";
						    echo "<td>" . $p-> getReserva() . "</td>";
						    echo "<td><span class='fas " . ($p->getEstado() == 0 ? "fa-times-circle" : "fa-check-circle") . "'   id='Estado" . $p->getIdPedido() . "'  data-toggle='tooltip'  class='tooltipLink' data-placement='left' data-original-title='" . ($p->getEstado() == 0 ? "Inhabilitado" : "Habilitado") . "' ></span>";
						    if($p->getChef()==NULL){
						        echo "<a class='fas fa-check-square' href='index.php?pid=" . base64_encode("presentacion/chef/consultarPedidoGeneralAjax.php") . "&idPedido=" . $p->getIdPedido() . "' data-toggle='tooltip' data-placement='left' title='Seleccionar'> </a>";
						    }
						    echo "</td>";
						    echo "</tr>";
						}
    echo "<tr><td colspan='9'>" . count($pedidos) . " registros encontrados</td></tr>"?>	
						</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	<?php foreach ($pedidos as $p) { ?>
	$("#cambiarEstado<?php echo $p -> getIdPedido(); ?>").click(function(){
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/chef/editarEstadoPedidoAjax.php") . "&idPedido=" . $p -> getIdPedido() . "&estado=" . (($p -> getEstado() == 0)?"1":"0") . "&chef=".$chef->getId()."\";\n"; ?>
		$("#estado<?php echo $p ->getIdPedido(); ?>").load(ruta);
	});
	<?php } ?>
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