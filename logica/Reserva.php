<?php

require 'persistencia/ReservaDAO.php';
require_once 'persistencia/Conexion.php';

class Reserva {
    private $idreserva;
    private $hora;
    private $fecha;
    private $cliente_idcliente;
    private $mesa_idmesa;
    private $recepcionista_idrecepcionista;
    private $estado;
    private $reservaDAO;
    private $conexion;
    
    
    function getIdreserva(){
        return $this -> idreserva;
    }
    
    function getHora(){
        return $this -> hora;
    }
    
    function getFecha(){
        return $this -> fecha;
    }
    
    function getCliente(){
        return $this -> cliente_idcliente;
    }
    
    function getMesa(){
        return $this -> mesa_idmesa;
    }
    
    function getRecepcionista(){
        return $this -> recepcionista_idrecepcionista;
    }
    
    function getEstado(){
        return $this -> estado;
    }
    
    
    function Reserva($idreserva="", $hora="", $fecha="", $cliente_idcliente="", $mesa_idmesa="", $recepcionista_idrecepcionista="" , $estado="" ){
        $this -> idreserva = $idreserva;
        $this -> hora = $hora;
        $this -> fecha = $fecha;
        $this -> cliente_idcliente = $cliente_idcliente;
        $this -> recepcionista_idrecepcionista = $recepcionista_idrecepcionista;
        $this -> mesa_idmesa = $mesa_idmesa;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> reservaDAO = new ReservaDAO($idreserva, $hora, $fecha, $cliente_idcliente, $mesa_idmesa, $recepcionista_idrecepcionista, $estado);
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Reserva($registro[0], $registro[1], $registro[2],$registro[3], $registro[4], $registro[5], $registro[6]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultarRecepcionista(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarRecepcionista());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Reserva($registro[0], $registro[1], $registro[2],$registro[3], $registro[4], $registro[5], $registro[6]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    
    function ValidarReserva(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> ValidarReserva());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return true;
        } else {
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function consultarReservaCliente(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarReservaCliente());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Reserva($registro[0], $registro[1], $registro[2],$registro[3], $registro[4], $registro[5], $registro[6]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    
    function buscarReserva($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> buscarReserva($filtro));
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Reserva($registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5],$registro[6]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> idreserva = $resultado[0];
        $this -> hora = $resultado[1];
        $this -> fecha = $resultado[2];
        $this -> cliente_idcliente = $resultado[3];
        $this -> recepcionista_idrecepcionista = $resultado[4];
        $this -> estado = $resultado[5];
        $this -> conexion -> cerrar();
    }
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> registrar());
        $this -> conexion -> cerrar();
        
    }
    
    function actualizarEstado(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO ->actualizarEstado());
        $this -> conexion -> cerrar();
    }
    
    function consultarReserva(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarReserva());
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
    
    function consultarDia(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarDia());
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

?>
