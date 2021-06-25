<?php
class PlatoDAO {
    private $idplato;
    private $nombre;
    private $precio;
    private $foto;
    
    function PlatoDAO ($idplato, $nombre, $precio, $foto){
        $this -> idplato = $idplato;
        $this -> nombre = $nombre;
        $this -> precio = $precio;
        $this -> foto = $foto;
    }
    
    function buscarPlato($filtro){
        return "select idplato, nombre, precio, foto
                from plato
                where  nombre like '%" . $filtro . "%'";
        
    }
    
    function consultarTodos(){
        return "select plato.idplato, plato.nombre, plato.precio, plato.foto
                from plato ;";
    }
    
    function consultar(){
        return "select idplato, nombre, precio, foto
                from plato
                where idplato = '" . $this -> idplato . "' ;";
    }
    
    function registrar(){
        return "insert into plato (nombre,precio, foto)
                value ('". $this -> nombre ."', ". $this -> precio.", '". $this-> foto."')";
        
    }
    
}

?>

