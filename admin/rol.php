<?php
    //Se llama la clase
    require_once("../class/roles.class.php");
    include ("view/nav-admin.php");

    $rol -> validarRol(2);
    

    //Existe accion?
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    //Obtiene id si es el caso
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id = is_numeric($id)?$id:null;

    //Switch opciones de accion
    switch($accion){

        //Caso para crear un nuevo registro
        case 'create':
            $data = isset($_POST['data'])?$_POST['data']:null;

            if(isset($data["enviar"])){
                $resultado = $rol -> create($data);
                
                if($resultado){
                    $resultado = $rol -> read();

                    $rol -> alerta("Rol agregada exitosamente ","success");
                    include('view/roles.php');

                }
                else{
                    $rol -> alerta(" Ocurrio un error, por favor compruebe sus datos","danger");
                    include('view/roles.php');
                }
            }
            else{
                include("view/roles.php");    
            }
        break;
        
        //Caso para borrar un registro
        case 'delete':
            $resultado = $rol -> delete($id);

            if($resultado){
                $rol -> alerta("Rol borrada con exito","success");
            }
            else{
                $rol -> alerta("Rol no encontrada","danger");
            }

            $resultado = $rol -> read();
            include('view/roles.php');
        break;

        //Caso para actualizar un dato
        case 'update':
            $data = isset($_POST["data"])?$_POST["data"]:null;

            if (!is_null($id)) {
                $resultado = $rol -> update($id,$data);
            }
            
            if($resultado){
                
                $rol -> alerta("Rol actualizada correctamente","success");
                
                $resultado = $rol -> read();
                include('view/roles.php');
            }
            else{   
                $rol -> alerta("Rol no actualizada","danger");
                include('view/roles.php');
            }
        break;
        
        //Caso que lanza la tabla de contenido
        default:                
            $resultado = $rol -> read();
            include("view/roles.php");
        break;
    }
?>