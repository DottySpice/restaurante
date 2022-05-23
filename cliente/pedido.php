<?php
    //Se llama la clase
    require_once("../class/usuarios.class.php");
    include ("view/nav-cliente.php");

    $usuario -> validarRol(1);
    $id_usuario = $_SESSION["id_usuario"];
    //Switch opciones de accion
    switch($accion){

        //Caso que lanza la tabla de contenido
        default:                
            $resultado = $usuario -> read_pedido($id_usuario);

            include('view/pedidos.php');
        break;
    }
?>