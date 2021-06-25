<?php
require 'persistencia/Pedido_PlatoDAO.php';
require_once 'persistencia/Conexion.php';
class Pedido_Plato{
    private $pedido_idpedido;
    private $plato_idplato;
    private $cantidad;
    private $descripcion;
    private $pedido_PlatoDAO;
    private $conexion;
    
    function getPedido(){
        return $this -> pedido_idpedido;
    }
    
    function getPlato(){
        return $this -> plato_idplato;
    }
    
    
    function getCantidad(){
        return $this -> cantidad;
    }
    
    function getDescripcion(){
        return $this -> descripcion;
    }
    
    
    function Pedido_Plato($pedido_idpedido="", $plato_idplato="", $cantidad = "", $descripcion = ""){
        $this -> pedido_idpedido = $pedido_idpedido;
        $this -> plato_idplato = $plato_idplato;
        $this -> cantidad = $cantidad;
        $this -> descripcion = $descripcion;
        $this -> conexion = new Conexion();
        $this -> pedido_PlatoDAO = new Pedido_PlatoDAO( $pedido_idpedido, $plato_idplato, $cantidad, $descripcion);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedido_PlatoDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function consultarReservaPlato(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedido_PlatoDAO -> consultarReservaPlato());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Pedido_Plato("",$registro[0], $registro[1], $registro[2]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedido_PlatoDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> pedido_idpedido = $resultado[0];
        $this -> plato_idplato = $resultado[1];
        $this -> cantidad = $resultado[2];
        $this -> descripcion = $resultado[3];
        $this -> conexion -> cerrar();
    }
    
    function consultarPlatoVendido(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedido_PlatoDAO -> consultarPlatoVendido());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i][0] = $registro[0];
            $resultados[$i][1] = $registro[1];
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
}