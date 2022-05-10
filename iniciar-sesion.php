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
                            echo $_SESSION["id_rol"];
                            echo'Eres un cliente';
                        }
                    }
                    else {
                        //Caso para cuando correo y contrasena sean incorrectos
                        header("Location: iniciar-sesion-form.php?m=100");
                    }
                }
            }
            break;
        
        //Caso para cerrar sesion
        case 'logout':
                $conexion -> logOut();
                header("Location: index.php");
            break; 
    }
?>