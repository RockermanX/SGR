<?php
require 'persistencia/RecepcionistaDAO.php';
require_once 'persistencia/Conexion.php';

class Recepcionista extends Persona {
    private $recepcionistaDAO;
    private $conexion;
    
    function Recepcionista($id="", $nombre="", $apellido="", $correo="", $clave=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> conexion = new Conexion();
        $this -> recepcionistaDAO = new RecepcionistaDAO($id, $nombre, $apellido, $correo, $clave);
    }
    
    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> recepcionistaDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> conexion -> cerrar();
            return true;
        } else {
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function SeleccionarRecepcionista(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> recepcionistaDAO -> SeleccionarRecepcionista());
        if($this -> conexion -> numFilas() == 1){
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> conexion -> cerrar();
            return true;
        } else {
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function buscarRecepcionista($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> recepcionistaDAO -> buscarRecepcionista($filtro));
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Recepcionista($registro[0], $registro[1], $registro[2], $registro[3]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> recepcionistaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> conexion -> cerrar();
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> recepcionistaDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> recepcionistaDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return false;
        } else {
            $this -> conexion -> cerrar();
            return true;
        }
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> recepcionistaDAO -> consultarTodos());
        
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Recepcionista($registro[0], $registro[1], $registro[2], $registro[3], "");
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
}



