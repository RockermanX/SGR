<?php

class ChefDAO {
    private $idchef;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $tarjetaprofesional;
    
    function ChefDAO($idchef = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $tarjetaprofesional = ""){
        $this->idchef = $idchef;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->tarjetaprofesional = $tarjetaprofesional;
    }
    
    function buscarChef($filtro){
        return "select idchef, nombre, apellido, correo, tarjetaprofesional
                from chef
                where  nombre like '%" . $filtro . "%' or apellido like '%" . $filtro . "%'";
    }
    
    function autenticar(){
        return "select idchef from chef
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function registrar(){
        return "insert into chef
                (nombre, apellido, correo, clave, tarjetaprofesional)
                values ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', md5('" . $this->clave . "'), '" . $this->tarjetaprofesional . "')";
    }
    
    function consultar() {
        return "select nombre, apellido, correo,  tarjetaprofesional
                from chef
                where idchef =" . $this -> idchef;
    }
    
    function existeCorreo(){
        return "SELECT idchef
                FROM chef
                where correo = '" . $this->correo . "' and correo= ALL(
	               SELECT idrecepcionista
	               FROM recepcionista
	               where correo = ALL(
                        SELECT idcliente
	                    FROM cliente
	                    where correo='". $this -> correo ."'
        
        )); ";
    }
    
    function consultarTodos(){
        return "select idchef,nombre, apellido, correo, tarjetaprofesional
                from chef
                order by apellido";

    }
    
}