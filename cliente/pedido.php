<?php
    //Se llama la clase
    require_once("../class/usuarios.class.php");
    include ("view/nav-cliente.php");

    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    $id_pedido_detalle = isset($_GET['id_pedido_detalle'])?$_GET['id_pedido_detalle']:null;
    $id_pedido_detalle = is_numeric($id_pedido_detalle)?$id_pedido_detalle:null;

    $usuario -> validarRol(1);
    $id_usuario = $_SESSION["id_usuario"];

    //Switch opciones de accion
    switch($accion){

        case 'pdf':
            $resultado = $usuario -> read_one_pedido($id_pedido_detalle);
            include('view/pdf.php');
        break;

        //Caso que lanza la tabla de contenido
        default:                
            $resultado = $usuario -> read_pedido($id_usuario);

            include('view/pedidos.php');
        break;
    }
?>