<?php

class ClienteDAO {
    private $idcliente;
    private $nombre;
    private $apellido;
    private $correo;
    private $estado;
    private $cedula;
    private $clave;
    
    function ClienteDAO($idcliente , $nombre , $apellido , $correo , $clave , $estado, $cedula){
        $this->idcliente = $idcliente;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->estado = $estado;
        $this->cedula = $cedula;
    }
    

    function autenticar(){
        return "select idcliente, estado from cliente
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function existeCorreo(){
        return "SELECT idcliente
                FROM cliente
                where correo = '" . $this->correo . "' and correo= ALL(
	               SELECT idrecepcionista
	               FROM recepcionista
	               where correo = ALL(
                        SELECT idchef
	                    FROM chef
	                    where correo='". $this -> correo ."'
	                        
        )); ";;
    }
    
    function actualizarEstado(){
        return "update cliente set
                estado = " . $this -> estado . "
                where idcliente=" . $this -> idcliente;
    }
    
    function registrar(){
        return "insert into cliente
                (nombre, apellido, correo, clave, estado, cedula)
                values ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', md5('" . $this->clave . "'), '". $this->estado ."', '". $this->cedula ."')";
    }
    
    function consultar() {
        return "select nombre, apellido, correo, estado, cedula 
                from cliente
                where idcliente =" . $this -> idcliente;
    }
    
    function consultar_nombre(){
        return "select nombre, apellido, correo, estado, cedula
                from cliente
                where nombre =" . $this -> nombre;
    }
    
    function consultarTodos(){
        return "select idcliente,nombre, apellido, correo, estado, cedula
                from cliente
                order by apellido";
    }
    
    function buscarCliente($filtro){
        return "select idcliente,nombre, apellido, correo, estado,cedula
                from cliente
                where  nombre like '%" . $filtro . "%' or
                apellido like '%" . $filtro . "%'";
        
    }
}

    
?>

