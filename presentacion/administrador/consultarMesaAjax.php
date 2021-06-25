<?php
$mesa = new Mesa();
$mesas = $mesa->buscarMesa($_REQUEST["fil"]);
?>
<div class="card">
	<div class="card-header bg-secondary text-white">Consultar Mesa</div>
	<div class="card-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Numero de Personas</th>
				</tr>
			</thead>
			<tbody>
						<?php
    foreach ($mesas as $m) {
        echo "<tr>";
        echo "<td>" . $m->getIdmesa() . "</td>";
        echo "<td>" . $m->getNombre() . "</td>";
        echo "<td>" . $m->getNpersonas() . "</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($mesas) . " registros encontrados</td></tr>"?>	
						</tbody>
		</table>
	</div>
</div>