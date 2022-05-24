<?php 

    require_once("../class/categorias.class.php");

    switch ($_SERVER["REQUEST_METHOD"]) {

        case 'POST':
            //Para obtener los datos desde Postman
            $data = json_decode(file_get_contents('php://input'));

            //Caso para actualizar
            if (isset($_GET['id_categoria'])) {
                $id_categoria = $_GET['id_categoria'];
                $categoria -> update_postman($id_categoria, $data -> categoria);

                echo "Se ha actualizado la categoria";
            }
            //Caso para insertar datos
            else {
                $categoria -> create_postman($data -> categoria);

                echo "Se ha dado de alta una categoria";
            }
        break;


        case 'DELETE':

            if (isset($_GET['id_categoria'])) {
                $id_categoria = $_GET['id_categoria'];
                $categoria -> delete($id_categoria);

                echo "Se ha eliminado la categoria";
            }
        break;

        case 'GET':
            //Si en enviada una id se obtiene la id y se muestra
            if (isset($_GET['id_categoria'])) {

                $id_categoria = $_GET['id_categoria'];
                $datos = $categoria -> readOne($id_categoria);

                echo "Metodo Get One";
                echo json_encode($datos);
            }
            else {
                //Se muestran todos los datos de la tabla
                $datos = $categoria -> read();
                echo "Metodo Get All";
                echo json_encode($datos);
            }
        break;
        
    }




?>