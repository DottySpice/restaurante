<?php
    //Se llama la clase
    //require_once("../class/carros.class.php");
    require_once("../class/usuarios.class.php");
    require_once("../class/platos.class.php");
    include ("view/nav-cliente.php");

    //$carro -> validarRol(1);
    
    //Existe accion?
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    //Obtiene id si es el caso
    $id_usuario = $_SESSION["id_usuario"];
    
    $id_plato = isset($_GET['id_plato'])?$_GET['id_plato']:null;
    $id_plato = is_numeric($id_plato)?$id_plato:null;

    $id_producto = isset($_GET['id_producto'])?$_GET['id_producto']:null;
    $id_producto = is_numeric($id_producto)?$id_producto:null;


    //Switch opciones de accion
    switch($accion){
        //Caso para agregar un producto al carrito
        case 'agregarCarro':
            //Enviamos el id_plato que fue seleccionado y la cantidad en data
            $data = isset($_POST['data'])?$_POST['data']:null;
            
            //Leemos los datos del id_plato seleccionado
            $data_plato = $plato -> readOne($id_plato);

            //Se asigna la cantidad solicitada a una variable
            $cantidad = $data["cantidad"];

            //Preguntamos si existe el SESSION carrito

            if (isset($_SESSION['carrito'])) {
                //Si existe, se guarda en un temporal, para poder agregar mas datos
                $mi_carro = $_SESSION['carrito'];

                //Se guardan los datos a agregar en variables
                $plato = $data_plato[0]["plato"];
                $precio = $data_plato[0]["precio"];
                
                //Se guardan los datos en el array
                $mi_carro[] = array("plato" => $plato, "precio" => $precio, "cantidad" => $cantidad);
            }
            else {
                //Si no existe el carro, se crea el array
                //Se guardan los datos a agregar en variables
                $plato = $data_plato[0]["plato"];
                $precio = $data_plato[0]["precio"];
                //Se guardar los datos en un array
                $mi_carro[] = array("plato" => $plato, "precio" => $precio, "cantidad" => $cantidad);
            }

            //Una vez terminado de guardar los datos en el array
            //Se actualiza el carrito SESSION con los nuevos datos o datos existentes
            $_SESSION['carrito'] = $mi_carro;

            //print_r($_SESSION['carrito']);
            //die();

            //Cuando se guarden los datos en SESSION de carrito, mandar al menu nuevamente
            //Error al usar header
            //require_once("index.php");
            include("view/modificar-carro.php"); 

        break;

        case 'eliminarCarro':

            if (isset($_SESSION["carrito"])) {unset ($_SESSION["carrito"]);}
            //require_once("index.php");

        break;
        
        //Se hace el procedimiento para pagar
        case 'pagar':
            //Pagamos el carrito, tenemos id del usuario y el carro se pone en un array
            $data = isset($_POST['data'])?$_POST['data']:null;

            if(isset($data["enviar"])){
                $resultado = $usuario -> crear_pedido($data,$mi_carro,$id_usuario);
                
                if($resultado){

                    if (isset($_SESSION["carrito"])) {unset ($_SESSION["carrito"]);}
                    $resultado = $usuario -> read_pedido($id_usuario);
                    $usuario -> alerta("Pedido agregado exitosamente ","success");
                    include('view/pedidos.php');
                    
                }
                else{
                    if (isset($_SESSION["carrito"])) {unset ($_SESSION["carrito"]);}
                    $usuario -> alerta(" Ocurrio un error, intentelo de nuevo","danger");
                    include('view/pedidos.php');
                }
            }
                
        break;

        case 'datosEnvio':
            //Enviamos el carrito y la informacion basica del usuario usando el session

            //$resultado = $usuario -> readOne($id_usuario);

            $mi_carro = $_SESSION['carrito'];

            include("view/datos-envio.php"); 

        break;

        case 'modificarCarro':

            $mi_carro = $_SESSION['carrito'];

            include("view/modificar-carro.php"); 

        break;
        
        case 'eliminarProducto':
            $mi_carro = $_SESSION['carrito'];
     
            //Se borra el lugar en array del indice dado
            array_splice($mi_carro, $id_producto, 1);
            
            //Se actualizan las sesiones del carrito
            $_SESSION['carrito'] = $mi_carro;

            //Se envia el carro para ser modificado nuevamente
            $mi_carro = $_SESSION['carrito'];
            include("view/modificar-carro.php"); 
        break;
        
    }
?>