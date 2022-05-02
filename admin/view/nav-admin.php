<?php 
    include "../functions-header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row">
        <nav class="navbar navbar-expand navbar-light" style="background-color: #592321 ;">
            <div class="container-fluid ">
                <a class="text-nav" href="index.php">
                    <img src="../images/logo.jpg" alt="" width="40" height="40" class="d-inline-block align-text-top">
                    Restaurante - Administracion
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="nav nav-pills-admin nav-justified">
                        <li class="nav-item">
                            <a class="nav-link-admin <?=imprimirActivo("index")?>" href="index.php"><div><i class="fa-solid fa-house fa-lg"></i></div>Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-admin <?=imprimirActivo("categoria")?>" href="categoria.php"><div><i class="fa-solid fa-utensils fa-lg"></i></div>Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-admin <?=imprimirActivo("plato")?>" href="plato.php"><div><i class="fa-solid fa-people-group fa-lg"></i></div>Platos</a>
                        </li>
                    </ul>
                </div>

                <div class="">
                    <ul class="nav justify-content-end text-center">
                        <li class="nav-item">
                            <a class="nav-link-admin <?=imprimirActivo("perfil")?>" href="perfil.php"><div><i class="fa-solid fa-arrow-right-to-bracket fa-lg"></i></div>Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-admin <?=imprimirActivo("cerrar-sesion")?>" href="cerrar-sesion.php"><div><i class="fa-solid fa-arrow-right-to-bracket fa-lg"></i></div>Cerrar Sesion</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>