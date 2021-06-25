<?php
$reserva = new Reserva();
$reservas = $reserva->buscarReserva($_REQUEST["fil"]);
?>

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
        echo "<td>" . $r->getIdreserva() . "</td>";
        echo "<td>" . $r->getHora() . "</td>";
        echo "<td>" . $r->getFecha() . "</td>";
        echo "<td>" . $r->getCliente() . "</td>";
        echo "<td>" . $r->getMesa() . "</td>";
        echo "<td>" . $r->getRecepcionista() . "</td>";
        echo "<td><span class='fas " . ($r->getEstado() == 0 ? "fa-times-circle" : "fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($r->getEstado() == 0 ? "Inhabilitado" : "Habilitado") . "' ></span></td>";
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