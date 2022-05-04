<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
    <title>Iniciar Sesion - Restaurante By E. Villegas Planner</title>
</head>
<body>
    <div class=" container-fluid">
        <?php  include('navbar.php');?>
    </div>

    <div class="container-fluid text-center p-3">
        <div class="row text-green">
            <div class="col"></div>
            <div class="col border border-4 m-3 p-4">
                <div class="row">
                    <h1>Iniciar Sesion</h1>
                </div>
                <div class="row text-center">
                    <div>
                        <img src="images/logo.jpg" width="20%">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="iniciar-sesion.php?accion=login">
                        <div class="text-green"> 
                            <div class="input-group mb-3">
                                <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="correo" class="form-control" placeholder="Correo">
                            </div> 
                            <div class="input-group mb-3">
                                <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                <input type="password" name="contrasena" class="form-control" placeholder="Contrasena">
                            </div>          
                        </div>
                        <?php  
                            //Para imprimir error obteniendo el valor de m
                            if(isset ($_GET["m"])){
                                switch($_GET['m']){
                                    case 100: echo '<div class="alert alert-danger" role="alert">Correo o contrasena incorrecta</div>';
                                    break;
                                    case 300: echo '<div class="alert alert-danger" role="alert"> Incia sesion primero</div>';
                                    break;
                                    case 200: echo '<div class="alert alert-danger" role="alert"> No tienes acceso a esta pagina</div>';
                                    break;
                                } 
                            }
                        ?>   
                        <button class="w-100 btn btn-primary" type="submit">Iniciar Sesion</button>
                    </form>
                    <div class="form-text">
                        <a href="">Olvidaste tu contrasena</a>
                    </div>
                    <div class="form-text">
                        <a href="registrate-form.php">Registrate aqui!</a>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <?php  include("footer.php");?>
</body>
</html>