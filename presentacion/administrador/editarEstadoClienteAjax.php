<?php
$cliente = new Cliente($_GET['idCliente'], "", "", "", "", $_GET['estado'], "");
$cliente->actualizarEstado();
echo "<span class='fas " . ($cliente->getEstado()==0?"fa-times-circle":"fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($cliente->getEstado()==0?"Inhabilitado":"Habilitado") . "' ></span>";