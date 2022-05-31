<?php 
    require_once("class/conexion.class.php");
    
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    switch ($accion) {
        //Caso de inicio de sesion
        case 'login':
            if (isset($_POST["correo"]) && isset($_POST["contrasena"])) {
                $correo = $_POST["correo"];
                $contrasena = $_POST["contrasena"];
                //Se valida el correo
                if ($conexion -> validarCorreo($correo)) {
                    //Se inicia sesion con correo y contrasena
                    if ($conexion -> login($correo, $contrasena)) {
                        //Comprobar que tipo de usuario es mediante su rol
                        if ($_SESSION["id_rol"] == 2) {
                            header("Location: admin/index.php");
                        }
                        else{
                            header("Location: cliente/index.php");
                        }
                    }
                    else {
                        //Caso para cuando correo y contrasena sean incorrectos
                        header("Location: iniciar-sesion-form.php?m=100");
                    }
                }
            }
            break;

        case 'olvido':
            if(isset($_POST['correo'])){

                $correo = $_POST['correo'];

                if ($conexion -> validarCorreo($correo)){
                    if($conexion -> recuperar($correo)){
                        header("Location: olvido-contrasena.php?m=100");
                        $conexion -> alerta("Correo enviado, por favor verifique su bandeja","success");
                    }
                    else{
                        $conexion -> alerta("Correo electronico no valido ","danger");
                    }  
                }
                else{
                    $conexion -> alerta("Correo electronico no valido ","danger");
                }
            }
            include_once('olvido-contrasena.php');
        break;  
        
        case 'restablecer':
            if(isset($_GET['correo']) && isset($_GET['token'])){
                $correo = $_GET['correo'];
                $token =  $_GET['token'];

                if($conexion -> validarToken($correo,$token)){

                    include_once('restablecer-contrasena.php');

                }else{
                    header("Location: iniciar-sesion-form.php?m=500");
                }
            }else{
                $conexion -> alerta("Ocurrio un error grave ","danger");
            }
        break;

        case 'nueva':
            if(isset($_GET['correo']) && isset($_POST['token']) && isset($_POST['contrasena'])){
                $correo = $_GET['correo'];
                $contrasena = $_POST['contrasena'];
                $token =  $_POST['token'];

                if($conexion -> validarToken($correo,$token)){
                    if($conexion -> nuevaContrasena($correo,$contrasena,$token)){    

                        header("Location: iniciar-sesion-form.php?m=400");
                        include_once('iniciar-sesion.php');
                    }
                    else{
                        $conexion -> alerta("Error al cambiar la contrasena","danger");;
                    }
                }
                else{
                    header("Location: iniciar-sesion-form.php?m=500");
                }
            }
            else{
                $conexion -> alerta("Un grave error ha ocurrido","warning");
            }
        break;
        
        //Caso para cerrar sesion
        case 'logout':
                $conexion -> logOut();
                header("Location: index.php");
            break; 
    }
?>