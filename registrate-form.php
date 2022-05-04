<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
    <title>Registrate - Restaurante By E. Villegas Planner</title>
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
                    <h1>Registrate</h1>
                </div>
                <div class="row text-center">
                    <div>
                        <img src="images/logo.jpg" width="20%">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="registrate.php?accion=registro">
                        <div class="text-green">
                            <h3>Datos de usuario</h3> 
                            <div class="input-group mb-3">
                                <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="data[correo]" class="form-control" placeholder="Correo">
                            </div> 
                            <div class="input-group mb-3">
                                <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                <input type="password" name="data[contrasena]" class="form-control" placeholder="Contrasena">
                            </div>          
                        </div>
                        <hr>
                        <h3>Datos personales</h3>  
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input name="data[nombre]" class="form-control" placeholder="Nombre completo">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>
                            <input name="data[direccion]" class="form-control" placeholder="Direccion">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-envelopes-bulk"></i></span>
                            <input name="data[codigo_postal]" class="form-control" placeholder="Codigo postal">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text text-green" for="inputGroupSelect01"><i class="fa-solid fa-tag"></i></label>
                            <select class="form-select" name="data[sexo]">
                                <option selected>Selecciona tu sexo...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="NA">Prefiero no decirlo</option>
                            </select>
                        </div>
                        <?php  
                            //Para imprimir error obteniendo el valor de m
                            if(isset ($_GET["m"])){
                                switch($_GET['m']){
                                    case 100: echo '<div class="alert alert-danger" role="alert">Correo ya registrado</div>';
                                    break;
                                    case 200: echo '<div class="alert alert-success" role="alert">Usuario registrado correctamente</div>';
                                    break;
                                } 
                            }
                        ?>  
                        <hr>
                        <input class="btn btn-success" type="submit" value="Registrame!" name="data[enviar]" />
                    </form>
                    <div class="form-text">
                        <a href="">Olvidaste tu contrasena</a>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <?php  include("footer.php");?>
</body>
</html>