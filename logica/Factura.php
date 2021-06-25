<?php

require 'persistencia/FacturaDAO.php';
require_once 'persistencia/Conexion.php';

class Factura {
    private $idfactura;
    private $montoFinal;
    private $pedido_idpedido;
    private $facturaDAO;
    private $conexion;
    
    function getIdfactura(){
        return $this -> idfactura;
    }
    
    function getmontoFinal(){
        return $this -> montoFinal;
    }
    
    function getPedido(){
        return $this -> pedido_idpedido;
    }
    
    
    
    function Factura($idfactura="", $montoFinal="", $pedido_idpedido=""){
        $this -> idfactura = $idfactura;
        $this -> montoFinal = $montoFinal;
        $this -> pedido_idpedido = $pedido_idpedido;
        $this -> conexion = new Conexion();
        $this -> facturaDAO = new FacturaDAO($idfactura, $montoFinal, $pedido_idpedido);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO -> registrar());
        $this -> conexion -> cerrar();
    }

}