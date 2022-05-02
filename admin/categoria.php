<?php
    //Se llama la clase
    require_once("../class/categorias.class.php");
    include ("view/nav-admin.php");
    

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
                $resultado = $categoria -> create($data);
                
                if($resultado){
                    $resultado = $categoria -> read();

                    $categoria -> alerta("Categoria agregada exitosamente ","success");
                    include('view/categorias.php');

                }
                else{
                    $categoria -> alerta(" Ocurrio un error, por favor compruebe sus datos","danger");
                    include('view/categorias.form.php');
                }
            }
            else{
                include("view/categorias.form.php");    
            }
        break;
        
        //Caso para borrar un registro
        case 'delete':
            $resultado = $categoria -> delete($id);

            if($resultado){
                $categoria -> alerta("Categoria borrada con exito","success");
            }
            else{
                $categoria -> alerta("Categoria no encontrada","danger");
            }

            $resultado = $categoria -> read();
            include('view/categorias.php');
        break;

        //Caso para actualizar un dato
        case 'update':
            $data = isset($_POST["data"])?$_POST["data"]:null;

            if (!is_null($id)) {
                $resultado = $categoria -> update($id,$data);
            }
            
            if($resultado){
                
                $categoria -> alerta("Categoria actualizada correctamente","success");
                
                $resultado = $categoria -> read();
                include('view/categorias.php');
            }
            else{   
                $categoria -> alerta("Categoria no actualizada","danger");
                include('view/categorias.php');
            }
        break;
        
        //Caso que lanza la tabla de contenido
        default:                
            $resultado = $categoria -> read();
            include("view/categorias.php");
        break;
    }
?>