<?php 
    require_once("../class/platos.class.php");
    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST':

            //Para obtener los datos desde Postman
            $data = json_decode(file_get_contents('php://input'));

            //Caso para actualizar
            if (isset($_GET['id_plato'])) {
                $id_plato = $_GET['id_plato'];

                $plato -> update_postman($id_plato, $data -> plato, $data -> descripcion, $data -> precio, $data -> foto, $data -> id_categoria );

                echo "Se ha actualizado el platillo";
            }
            //Caso para insertar datos
            else {
                $plato -> create_postman($data -> plato, $data -> descripcion, $data -> precio, $data -> foto, $data -> id_categoria );

                echo "Se ha dado de alta un platillo";
            }
        break;

        case 'DELETE':

            if (isset($_GET['id_plato'])) {
                $id_plato = $_GET['id_plato'];
                $plato -> delete($id_plato);

                echo "Se ha eliminado el platillo";
            }
        break;

        case 'GET':
            //Si en enviada una id se obtiene la id y se muestra
            if (isset($_GET['id_plato'])) {

                $id_plato = $_GET['id_plato'];
                $datos = $plato -> readOne($id_plato);

                echo "Metodo Get One";
                echo json_encode($datos);
            }
            else {
                //Se muestran todos los datos de la tabla
                $datos = $plato -> read();
                echo "Metodo Get All";
                echo json_encode($datos);
            }
        break;
    }
?>