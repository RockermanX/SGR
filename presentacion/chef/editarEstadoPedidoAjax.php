<?php
$pedido = new Pedido($_GET['idPedido'],"", "",$_GET['estado'] );
$pedido->actualizarEstado();
echo "<span class='fas " . ($pedido ->getEstado()==0?"fa-times-circle":"fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($pedido->getEstado()==0?"Inhabilitado":"Habilitado") . "' ></span>";