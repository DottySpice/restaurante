<?php
    //Se llama la clase
    require_once("../class/platos.class.php");
    require_once("../class/categorias.class.php");
    include ("view/nav-admin.php");
    

    //Existe accion?
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    //Obtiene id si es el caso
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id = is_numeric($id)?$id:null;

    $categorias = $categoria -> read();

    //Switch opciones de accion
    switch($accion){

        //Caso para crear un nuevo registro
        case 'create':
            $data = isset($_POST['data'])?$_POST['data']:null;

            if(isset($data["enviar"])){
                $resultado = $plato -> create($data);
                
                if($resultado){
                    $resultado = $plato -> read();

                    $plato -> alerta("Plato agregado exitosamente ","success");
                    include("view/platos.php");

                }
                else{
                    $plato -> alerta(" Ocurrio un error, por favor compruebe sus datos","danger");
                    include("view/platos.php");
                }
            }
            else{
                include("view/platos.php");    
            }
        break;
        
        //Caso para borrar un registro
        case 'delete':
            $resultado = $plato -> delete($id);

            if($resultado){
                $plato -> alerta("Plato borrado con exito","success");
            }
            else{
                $plato -> alerta("Plato no encontrado","danger");
            }

            $resultado = $plato -> read();
            include("view/platos.php");
        break;

        //Caso para actualizar un dato
        case 'update':
            $data = isset($_POST["data"])?$_POST["data"]:null;

            if (!is_null($id)) {
                $resultado = $plato -> update($id,$data);
            }
            
            if($resultado){
                
                $plato -> alerta("Plato actualizado correctamente","success");
                
                $resultado = $plato -> read();
                include("view/platos.php");
            }
            else{   
                $categoria -> alerta("Plato no actualizado","danger");
                include("view/platos.php");
            }
        break;
        
        //Caso que lanza la tabla de contenido
        default:                
            $resultado = $plato -> read();
            include("view/platos.php");
        break;
    }
?>