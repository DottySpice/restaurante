<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
    <title>Contacto</title>
</head>
<body>
    <div class=" container-fluid">
        <?php  include('navbar.php');?>
    </div>

    <div class="container-fluid text-center m-2">
        <div class="row">
            <div class="row text-blue">
                <h1>Contactanos</h1>
            </div>

            <div class="row text-green">
                <div class="col border m-1">
                    <div class="row">
                        <h3>Llamanos</h3>
                        <i class="fa-solid fa-phone fa-2x"></i>
                    </div>
                    <div class="row  m-4">   
                        <a href="https://wa.me/524612976027" target="_blank"> <h3>+52 461 297 6027</h3> </a>
                    </div>
                </div>

                <div class="col border m-1">
                    <div class="row">
                        <h3>Encuentranos</h3>
                        <i class="fa-solid fa-map-location-dot fa-2x"></i>
                    </div>
                    <div class="row  m-4">   
                        <a>Av. Salvador Ortega, P.º de los Naranjos 1906‐Local 1 y 2, 38016 Celaya, Gto.</a> 
                    </div>
                </div>

                <div class="col border m-1">
                    <div class="row">
                        <h3>Mandanos un correo</h3>
                        <i class="fa-solid fa-envelope fa-2x"></i>
                    </div>
                    <div class="row  m-4">   
                        <a>RestauranteByE.VillegasPlanner@gmail.com</a> 
                    </div>
                </div>
            </div>

            <div class="row text-center text-blue">
                <div class="row">
                    <h3>Ubicanos!</h3>
                </div>
                <div class="row">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9689.808746328192!2d-100.85222180818376!3d20.54996355215793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cbb55e4980055%3A0x120cc353b6485104!2sBuffet%20%26%20Tacos%20%2F%20Restaurante%20By%20E.%20Villegas%20Planner!5e0!3m2!1ses!2smx!4v1651008668889!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
                </div>
            </div>
        </div>
    </div>
    
    <?php include ("footer.php") ?>
    <?php include ("js/boostrap.js") ?>
</body>
</html>