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
        
            $consulta = $this -> db -> prepare("SELECT * FROM usuario LEFT JOIN persona 
            USING (id_persona) 
            WHERE correo=:correo AND contrasena=:contrasena");  

            $consulta -> bindParam(':correo', $correo, PDO::PARAM_STR);
            $consulta -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

            $consulta -> execute();
            $resultado = $consulta -> fetch(PDO::FETCH_ASSOC);

            if (isset($resultado["correo"])) {

                $_SESSION["validado"] =  true;
                $_SESSION["correo"] =  $correo;
                $_SESSION["nombre"] =  $resultado["nombre"];
                $_SESSION["direccion"] =  $resultado["direccion"];
                $_SESSION["codigo_postal"] =  $resultado["codigo_postal"];
                $_SESSION["sexo"] =  $resultado["sexo"];
                $_SESSION["id_rol"] = $resultado["id_rol"];
                $_SESSION["id_persona"] = $resultado["id_persona"];
                $_SESSION["id_usuario"] = $resultado["id_usuario"];
                return true;
            }
        }
        $this -> logOut();
        return false;
    }

    public function recuperar($correo){
        require '../vendor/autoload.php';

        $consulta = $this -> db -> prepare("SELECT correo FROM usuario 
        WHERE correo=:correo");  

        $consulta -> bindParam(':correo', $correo, PDO::PARAM_STR);
        $consulta -> execute();
        $resultado= $consulta -> fetchAll(PDO::FETCH_ASSOC);

        if($resultado[0]['correo']){
            $token = substr(md5(md5($correo.random_int(1,100000).'golden'.md5(random_int(1,500))).soundex('uculele')),0,16);

            $consulta = $this -> db -> prepare("UPDATE usuario SET token=:token WHERE correo=:correo");

            $consulta -> bindParam(':correo', $correo, PDO::PARAM_STR);
            $consulta -> bindParam(':token', $token, PDO::PARAM_STR);
            $consulta -> execute();

            $mensaje = "
            <h2>Apreciable usuario presione el siguiente vilculo para reestablecer su contraseña.<h2><br>
            <h2>Recupere su contrasena en el siguiente link<h2><br>
            <a href=\"http://localhost/restaurante/iniciar-sesion.php?accion=restablecer&correo=$correo&token=$token\" target=\"_blank\">Recuperar contraseña</a>
            <br><br>
            Si usted no realizo esta acción por favor ignore este correo y contacte al administrador.";

            $this -> send_correo($correo, "Recuperación de contraseña", $mensaje);

            return true;
        }
        return false;
    }

    public function send_correo($destinatario,$asunto,$msj){
        require '../vendor/autoload.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer;
        $mail -> isSMTP();
        $mail -> SMTPDebug = 0;
        $mail -> Host = 'smtp.gmail.com';
        $mail -> Port = 465;
        $mail -> SMTPSecure = 'ssl';
        $mail -> SMTPAuth = true;
        $mail -> Username = '18031006@itcelaya.edu.mx';
        $mail -> Password = '123Tamarindo';
        $mail -> setFrom('18031006@itcelaya.edu.mx', 'Maximiliano');
        $mail -> addAddress($destinatario, $destinatario);
        $mail -> Subject = $asunto;
        $mail -> msgHTML($msj);

        if (!$mail -> send()) {
            echo "Mailer Error: " . $mail -> ErrorInfo;
            return false;
        } 
        else {
            return true;
        }
    }


    public function validarToken($correo,$token){
        if($this->validarCorreo($correo) && strlen($token)==16){

            $consulta = $this -> db -> prepare("SELECT * FROM usuario 
            WHERE correo=:correo AND token=:token");

            $consulta->bindParam(':correo', $correo, PDO::PARAM_STR);
            $consulta->bindParam(':token', $token, PDO::PARAM_STR);
            $consulta->execute();

            $resultado = $consulta -> fetch(PDO::FETCH_ASSOC);

            if (isset($resultado['correo'])){
                return true;
            }
        }
        return false;
    }


    public function nuevaContrasena($correo,$contrasena,$token){
        $contrasena = md5($contrasena);

        $consulta = $this -> db -> prepare("UPDATE usuario SET contrasena=:contrasena, token = NULL 
        WHERE correo=:correo AND token=:token");

        $consulta -> bindParam(':correo',$correo, PDO::PARAM_STR);
        $consulta -> bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
        $consulta -> bindParam(':token',$token, PDO::PARAM_STR);
        $resultado = $consulta->execute();
        
        return $resultado;
    }

    //Para cerrar sesion y destruir la sesion actual
    public function logOut(){
        if (isset($_SESSION["validado"])) {unset ($_SESSION["validado"]);}
        if (isset($_SESSION["correo"])) {unset ($_SESSION["correo"]);}
        if (isset($_SESSION["id_rol"])) {unset ($_SESSION["id_rol"]);}
        if (isset($_SESSION["id_usuario"])) {unset ($_SESSION["id_usuario"]);}
        if (isset($_SESSION["id_persona"])) {unset ($_SESSION["id_persona"]);}
        if (isset($_SESSION["sexo"])) {unset ($_SESSION["sexo"]);}
        if (isset($_SESSION["codigo_postal"])) {unset ($_SESSION["codigo_postal"]);}
        if (isset($_SESSION["direccion"])) {unset ($_SESSION["direccion"]);}
        if (isset($_SESSION["nombre"])) {unset ($_SESSION["nombre"]);}
        if (isset($_SESSION["carrito"])) {unset ($_SESSION["carrito"]);}
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