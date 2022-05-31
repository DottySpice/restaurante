<?php 
    include "functions-header.php";
?>

<div class="row">
    <nav class="navbar navbar-expand navbar-light" style="background-color: #592321 ;">
        <div class="container-fluid ">
            <a class="text-nav" href="index.php">
                <img src="images/logo.jpg" alt="" width="40" height="40" class="d-inline-block align-text-top">
                Restaurante
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="nav nav-pills-admin nav-justified">
                    <li class="nav-item">
                        <a class="nav-link-admin <?=imprimirActivo("index")?>" href="index.php"><div><i class="fa-solid fa-house fa-lg"></i></div>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-admin <?=imprimirActivo("menu")?>" href="menu.php"><div><i class="fa-solid fa-utensils fa-lg"></i></div>Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-admin <?=imprimirActivo("acercaDe")?>" href="acercaDe.php"><div><i class="fa-solid fa-people-group fa-lg"></i></div>Acerca...</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-admin <?=imprimirActivo("contacto")?>" href="contacto.php"><div><i class="fa-solid fa-address-card fa-lg"></i></div>Contacto</a>
                    </li>
                </ul>
            </div>

            <div class="">
                <ul class="nav nav-pills-admin justify-content-end text-center">
                    <li class="nav-item">
                        <a class="nav-link-admin <?=imprimirActivo("iniciar-sesion-form")?>" href="iniciar-sesion-form.php"><div><i class="fa-solid fa-arrow-right-to-bracket fa-lg"></i></div>Iniciar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>