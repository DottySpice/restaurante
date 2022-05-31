<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
    <title>Restablecer Contrasena - Restaurante By E. Villegas Planner</title>
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
                    <h1>Restablecer Contrasena</h1>
                </div>
                <div class="row text-center">
                    <div>
                        <img src="images/logo.jpg" width="20%">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="iniciar-sesion.php?accion=nueva&correo=<?php echo $correo; ?>">
                        <div class="text-green"> 
                            <h3>Ingresa tu nueva contrasena</h3>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                <input type="password" name="contrasena" class="form-control" placeholder="Contrasena">
                            </div>  
                            <input type="hidden" name="token" value="<?php echo $token; ?>">        
                        </div>
                        <button class="w-100 btn btn-primary" type="submit">Actualizar Contrasena</button>
                    </form>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <?php  include("footer.php");?>
</body>
</html>