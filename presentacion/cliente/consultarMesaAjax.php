<?php
$mesa = new Mesa();
$mesas = $mesa->buscarMesa($_REQUEST["fil"]);
?>

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
