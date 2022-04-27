<?php

class Conexion{
    //Variables que se usaran en la clase
    var $db = null; 

    //Funcion que realiza la conexion a la base de datos
    public function conexion(){

        //variables que son usadas para la conexion con el metodo PDO
        $tipo = 'mysql';
        $host = 'localhost';
        $db_nombre = 'restaurante';
        $usuario = 'restaurante';
        $contrasena = '1234';

        $conexion = $tipo.':dbname='.$db_nombre.';host='.$host;

        $this -> db = new PDO($conexion,$usuario,$contrasena);

    }

    /*Metodo para cargar imagen
    public function cargarImagen($carpeta){
        if (isset($_FILES["foto"])) {

            $foto = $_FILES["foto"];

            if ($foto["error"] == 0) { 
                if (in_array($foto["type"],array("image/png","image/jpeg"))) {
                    if ($foto["size"] <= 500000000000000) {
                        $origen = $foto["tmp_name"];
                        $num = random_int(1 , 100);

                        $destino = "C:/xampp/htdocs/personales/heladeria/images/".$carpeta."/".$num."_".$foto["name"];
        
                        if (move_uploaded_file($origen,$destino)) {
                            return "images/".$carpeta."/".$num."_".$foto["name"];
                        }
                    }
                }
            }
        }   
        return false;
    }
    */
}
?>