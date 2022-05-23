<?php
    //Se llama la clase
    require_once("../class/usuarios.class.php");
    require_once("../class/roles.class.php");
    include ("view/nav-cliente.php");

    $usuario -> validarRol(1);
    
    //Existe accion?
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    //Obtiene los id si es que existen o no
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id_persona = isset($_GET['id_persona'])?$_GET['id_persona']:null;
    $id = is_numeric($id)?$id:null;
    $id_persona = is_numeric($id_persona)?$id_persona:null;

    //Se leen los roles para select
    $roles = $rol -> read();


    $id_usuario = $_SESSION["id_usuario"];
    //Switch opciones de accion
    switch($accion){
        
        //Caso para borrar un usuario
        case 'delete':
            $resultado = $usuario -> delete($id, $id_persona);

            $usuario -> logOut();
            header("Location: ../index.php");        
        break;

        //Caso para actualizar a un usuario
        case 'update':
            $data = isset($_POST["data"])?$_POST["data"]:null;

            if (!is_null($id)) {
                $resultado = $usuario -> updatePerfil($id_persona,$data);

                if($resultado){
                    $resultado = $usuario -> readOne($id_usuario); 
                
                    $usuario -> alerta("Usuario actualizado correctamente","success");
                    include("view/perfiles.php");
                }
                else{
                    $resultado = $usuario -> readOne($id_usuario);

                    $usuario -> alerta("Usuario no actualizado, intente de nuevo ","danger");
                    include("view/perfiles.php");
                }        
            }
        break;
        
        //Caso que lanza la tabla de contenido
        default:                
            $resultado = $usuario -> readOne($id_usuario);
            include("view/perfiles.php");
        break;
    }
?>