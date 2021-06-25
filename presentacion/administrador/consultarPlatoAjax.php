<?php
$plato = new Plato();
$platos = $plato->buscarPlato($_REQUEST["fil"]);
?>
<div class="card">
	<div class="card-header bg-secondary text-white">Consultar Plato</div>
	<div class="card-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Precio</th>
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
