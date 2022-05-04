<?php 
    require_once("../class/conexion.class.php"); 
    $conexion -> validarRol(1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
    <title>Bienvenido Administrador</title>
</head>
<body>
    <?php include ("view/nav-admin.php") ?>

    <div class=" container p-3">
        <div class="row text-center">
            <div>
                <img src="../images/logo.jpg" width="15%">
            </div>
        </div>
        <hr>
        <div class="row text-center text-blue">
            <h1>Bienvenido</h1>
            <h3><?php echo $_SESSION["correo"]; ?></h3>
        </div>
        <hr>
        <div class="row text-center">
            <div class="row text-green p-4">
                <h2>Empezemos</h2>
            </div>
            <div class="row">
                <div class="col">
                    <a href="categoria.php"><button class=" btn btn-info btn-lg">Categorias</button></a>
                </div>
                <div class="col">
                    <a href="plato.php"><button  class=" btn btn-info btn-lg">Platos</button></a>
                </div>  

            </div>
        </div>
    </div>

    <?php include ("../footer.php") ?>
    <?php include ("../js/boostrap.js") ?>
</body>
</html>