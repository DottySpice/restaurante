<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
    <title>Acerca de nosotros</title>
</head>
<body>
    <div class=" container-fluid">
        <?php  include('navbar.php');?>
    </div>

    <div class="container-fluid text-center m-2">
        <div class="row text-blue"> 
            <h1>Acerca de Nosotros</h1>
        </div>

        <div class="row text-green m-2">
            <div class="col border m-1">
                <div class="row">
                    <h3>Historia</h3>
                    <i class="fa-solid fa-book-open fa-2x"></i>
                </div>
                <div class="row m-4">   
                    <a>Restaurante con desayuno Buffet Nacional Todo Incluido, Servicio de carnes asadas diariamente y por las tardes concepto de cenaduria y taqueria.</a> 
                </div>
            </div>

            <div class="col border m-1">
                <div class="row">
                    <h3>Mision</h3>
                    <i class="fa-solid fa-earth-americas fa-2x"></i>
                </div>
                <div class="row m-4">   
                    <a>Nuestra principal misión es ofrecer a nuestros clientes productos de alta calidad, así como servicio y trato humano. Es por ello que tenemos la responsabilidad en mantener nuestros productos líderes "EL TACO Y EL BURRITO”; ya que al ofrecer a nuestros clientes “CALIDAD Y SABOR”, reafirmamos nuestro lema, conyugado con un servicio de excelencia, dejando a nuestros clientes satisfechos, manejando altos estándares de higiene y servicio.</a> 
                </div>
            </div>
        </div>

        <div class="row text-green m-2">
            <div class="col border m-1">
                <div class="row">
                    <h3>Vision</h3>
                    <i class="fa-solid fa-eye fa-2x"></i>
                </div>
                <div class="row  m-4">   
                    <a>Nuestra visión es ser una empresa de clase mundial Y líder en la producción de Platillos de la Gastronomía Mexicana,con la firme convicción de preservar la eficiencia en nuestro “SERVICIO, CALIDAD Y SABOR”, en todos y cada uno de los productos que ofrecemos, fortaleciendo de esta forma a la Gastronomía Mexicana, dejando satisfechos a nuestros clientes nacionales como internacionales, ya que manejamos altos estándares de higiene y servicio.</a> 
                </div>
            </div>

            <div class="col border m-1">
                <div class="row">
                    <h3>Valores</h3>
                    <i class="fa-solid fa-handshake fa-2x"></i>
                </div>
                <div class="row m-4">   
                    <a>Generar en el personal, y a la vez tramitir el compromiso por su trabajo con los demás.</a>
                    <ul>
                        <li>Respeto : El respeto por los clientes y por uno mismo. </li>
                        <li>Responsabilidad : El personal en todas las acciones realizadas.</li>
                        <li>Calidad : En el trato y en el servicio </li>
                        <li>Higiene : En los alimentos y en el personal.</li>
                    </ul> 
                </div>
            </div>
        </div>
    </div>

    <?php include ("footer.php") ?>
    <?php include ("js/boostrap.js") ?>
</body>
</html>