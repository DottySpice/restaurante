<?php

session_start();

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

    //Para iniciar sesion 
    public function login($correo, $contrasena){
        $contrasena = md5($contrasena);
        if ($this -> validarCorreo($correo)) {
        
            $consulta = $this -> db -> prepare("SELECT * FROM usuario 
            WHERE correo=:correo AND contrasena=:contrasena");  

            $consulta -> bindParam(':correo', $correo, PDO::PARAM_STR);
            $consulta -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

            $consulta -> execute();
            $resultado = $consulta -> fetch(PDO::FETCH_ASSOC);

            if (isset($resultado["correo"])) {
                $_SESSION["validado"] =  true;
                $_SESSION["correo"] =  $correo;
                $_SESSION["id_rol"] = $resultado["id_rol"];
                return true;
            }
        }
        $this -> logOut();
        return false;
    }

    //Para cerrar sesion y destruir la sesion actual
    public function logOut(){
        if (isset($_SESSION["validado"])) {unset ($_SESSION["validado"]);}
        if (isset($_SESSION["correo"])) {unset ($_SESSION["correo"]);}
        if (isset($_SESSION["id_rol"])) {unset ($_SESSION["id_rol"]);}
        session_destroy();
    }

    //Para validar el correo
    public function validarCorreo($correo){ 
        if (filter_var($correo,FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else {
            return false;
        }
    }

    //Para validar los roles de los usuarios
    public function validarRol($id_rol){
        if ($this -> validateUser()) {
            if ($id_rol == $_SESSION["id_rol"]) {
                return true;
            }
            else{
                //Caso en que los roles no sean correctos
                header("Location: ../iniciar-sesion-form.php?m=200");
            }
        }
        else {
            //Caso en que el usuario no esta validado
            header("Location: ../iniciar-sesion-form.php?m=300");
        }
    }

    //Funcion para validar al usuario
    public function validateUser(){
        if (isset($_SESSION["validado"])){
            if ($_SESSION["validado"]) {
                return true;
            }
        }
        return false;
    }

    //Funcion para mostrar las alertas
    public function alerta($mensaje,$tipo){
        include_once("view/mensajes.php");
    }

    //Metodo para cargar imagen
    public function cargarImagen($carpeta){
        if (isset($_FILES["foto"])) {

            $foto = $_FILES["foto"];

            if ($foto["error"] == 0) { 
                if (in_array($foto["type"],array("image/png","image/jpeg"))) {
                    if ($foto["size"] <= 500000000000000) {
                        $origen = $foto["tmp_name"];
                        $num = random_int(1 , 100);

                        $destino = "C:/xampp/htdocs/restaurante/images/".$carpeta."/".$num."_".$foto["name"];
        
                        if (move_uploaded_file($origen,$destino)) {
                            return "images/".$carpeta."/".$num."_".$foto["name"];
                        }
                    }
                }
            }
        }   
        return false;
    }
}
$conexion = new Conexion;
$conexion -> conexion();
?>