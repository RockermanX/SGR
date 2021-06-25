<?php

class MesaDAO {
    private $idmesa;
    private $nombre;
    private $numero_personas;
    
    function MesaDAO ($idmesa, $nombre, $numero_personas){
        $this -> idmesa = $idmesa;
        $this -> nombre = $nombre;
        $this -> numero_personas = $numero_personas;
        
    }
    
    function consultar(){
        return "select idmesa, nombre, numero_personas
                from mesa
                where idmesa = '" . $this -> idmesa . "'";
    }
    
    function consultarTodos(){
        return "select idmesa, nombre, numero_personas
                from mesa";
    }
    
    function buscarMesa($filtro){
        return "select idmesa,nombre, numero_personas
                from mesa
                where  idmesa like '%" . $filtro . "%' or nombre like '%" . $filtro . "%'";
        
    }
    
    function registrar(){
        return "insert into mesa (nombre,numero_personas)
                values ('". $this -> nombre ."', ". $this -> numero_personas.")";
        
    }
    
}