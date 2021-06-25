<?php
$c = new Chef();
$filtro = $_REQUEST["fil"];
$chefs = $c -> buscarChef($filtro);
?>
<div class="card">
	<div class="card-header bg-secondary text-white">Consultar Chef</div>
	<div class="card-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">Correo</th>
					<th scope="col">Tarjeta Profesional</th>
				</tr>
			</thead>
			<tbody>
						<?php
    foreach ($chefs as $c) {
        echo "<tr>";
        echo "<td>" . $c->getId() . "</td>";
        echo "<td>" . $c->getNombre() . "</td>";
        echo "<td>" . $c->getApellido() . "</td>";
        echo "<td>" . $c->getCorreo() . "</td>";
        echo "<td>" . $c->getTarjetaP() . "</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($chefs) . " registros encontrados</td></tr>"?>	
</tbody>
		</table>
	</div>
</div>