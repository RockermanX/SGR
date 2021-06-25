<?php
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$administrador = new Administrador("", "", "", $correo, $clave);
if($administrador -> autenticar()){
    $_SESSION['id'] = $administrador -> getId();    
    header("Location: index.php?pid=" . base64_encode("presentacion/administrador/sesionAdministrador.php"));
}else{
    $cliente = new Cliente("", "", "", $correo, $clave);
    if($cliente -> autenticar()){
        if($cliente -> getEstado() != 0 ){
            $_SESSION['id'] = $cliente -> getId();
            $_SESSION['contador']=0;
            $_SESSION['cesta']=[];
            header("Location: index.php?pid=" . base64_encode("presentacion/cliente/sesionCliente.php"));
        }else{
            echo'<script type="text/javascript">
                 alert("Usuario No autorizado");
                 window.location.href="index.php";
                  </script>';       
        }
    }else{
        $recepcionista = new Recepcionista("", "", "", $correo, $clave);
        if($recepcionista -> autenticar()){
            $_SESSION['id'] = $recepcionista -> getId();
            header("Location: index.php?pid=" . base64_encode("presentacion/recepcionista/sesionRecepcionista.php"));
        }else{
            $chef = new Chef("", "", "", $correo, $clave);
            if($chef -> autenticar()){
                $_SESSION['id'] = $chef -> getId();
                header("Location: index.php?pid=" . base64_encode("presentacion/chef/sesionChef.php"));
            }else{
                header("Location: index.php");
            }
        }
    }
}
?>