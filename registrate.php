<?php 
    require_once("class/usuarios.class.php");
    
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    switch ($accion) {
        //Caso para nuevo registro
        case 'registro':
            $data = isset($_POST['data'])?$_POST['data']:null;

            if(isset($data["enviar"])){
                $resultado = $usuario -> registrar($data);

                if (!$resultado) {
                    header("Location: registrate-form.php?m=100");
                }
                else {
                    header("Location: registrate-form.php?m=200");
                }
            }
        break;
    }
?>