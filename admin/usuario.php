<?php
    //Se llama la clase
    require_once("../class/usuarios.class.php");
    require_once("../class/roles.class.php");
    include ("view/nav-admin.php");

    $usuario -> validarRol(2);
    
    //Existe accion?
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    //Obtiene los id si es que existen o no
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id_persona = isset($_GET['id_persona'])?$_GET['id_persona']:null;
    $id = is_numeric($id)?$id:null;
    $id_persona = is_numeric($id_persona)?$id_persona:null;

    //Se leen los roles para select
    $roles = $rol -> read();

    //Switch opciones de accion
    switch($accion){

        //Caso para crear un nuevo usuario
        case 'registro':
            $data = isset($_POST['data'])?$_POST['data']:null;

            if(isset($data["enviar"])){
                $resultado = $usuario -> registrar($data);

                if (!$resultado) {
                    $resultado = $usuario -> read();

                    $usuario -> alerta("Correo ya existente, intente con otro correo ","danger");
                    include("view/usuarios.php");
                }
                else {
                    $resultado = $usuario -> read(); 
                    
                    $usuario -> alerta("Usuario agregado correctamente","success");
                    include("view/usuarios.php");
                }
            }
        break;
        
        //Caso para borrar un usuario
        case 'delete':
            $resultado = $usuario -> delete($id, $id_persona);

            if($resultado){
                $usuario -> alerta("Usuario borrado con exito","success");
            }
            else{
                $usuario -> alerta("Usuario no encontrado","danger");
            }

            $resultado = $usuario -> read();
            include("view/usuarios.php");
        break;

        //Caso para actualizar a un usuario
        case 'update':
            $data = isset($_POST["data"])?$_POST["data"]:null;

            if (!is_null($id)) {
                $resultado = $usuario -> update($id,$id_persona,$data);


                if($resultado){
                    $resultado = $usuario -> read(); 
                
                    $usuario -> alerta("Usuario actualizado correctamente","success");
                    include("view/usuarios.php");
                }
                else{
                    $resultado = $usuario -> read();

                    $usuario -> alerta("Usuario no actualizado, intente de nuevo ","danger");
                    include("view/usuarios.php");
                }        
            }
        break;
        
        //Caso que lanza la tabla de contenido
        default:                
            $resultado = $usuario -> read();
            include("view/usuarios.php");
        break;
    }
?>