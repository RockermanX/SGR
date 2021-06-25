<?php

class PedidoDAO {
    private $idpedido;
    private $reserva_idreserva;
    private $chef_idchef;
    private $estado;
    
    function PedidoDAO ($idpedido, $reserva_idreserva, $chef_idchef, $estado){
        $this -> idpedido = $idpedido;
        $this -> reserva_idreserva = $reserva_idreserva;
        $this -> chef_idchef = $chef_idchef;
        $this -> estado = $estado;
        
    }
    
    function consultar(){
        return "select reserva_idreserva, estado
                from pedido
                where idpedido =" . $this -> idpedido;
    }
    function consultarTodos(){
        return "select idpedido, reserva_idreserva, chef_idchef, estado
                from pedido";
    }
    
    function consultarId(){
        return "select idpedido
                from pedido
                where reserva_idreserva = " . $this -> reserva_idreserva ;
    }
    
    function actualizarEstado(){
        return "update pedido set
                estado = " . $this -> estado . "
                where idpedido=" . $this -> idpedido;
    }
    
    function actualizarChef(){
        return "update pedido set
                chef_idchef = ".$this->chef_idchef."
                where idpedido=" . $this -> idpedido;
    }
    
    function buscarPedido($filtro){
        return "select  idpedido, reserva_idreserva, chef_idchef, estado
                from pedido
                where reserva_idreserva like '%" . $filtro . "%'";
        
    }
    
    function registrar(){
        return "INSERT INTO pedido(reserva_idreserva,estado) VALUES(" . $this->reserva_idreserva . ",". 0 .")";
    }
    
    function consultarPedidoChef(){
        return "select idpedido, reserva_idreserva, estado
                from pedido
                where chef_idchef=". $this -> chef_idchef;
    }
   
    
    
}

?>

