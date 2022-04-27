<?php require_once("class/platos.class.php"); ?>
<?php require_once("class/categorias.class.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
    <title>Menu - Restaurante By E. Villegas Planner</title>
</head>
<body>
    <div class=" container-fluid">
        <?php  include('navbar.php');?>
    </div>
    
    <div class=" container-fluid">
        <div class="row">
            <div class="row text-blue text-center">
                <h1>Categorias </h1>
            </div>
            <div class="row text-green text-center">
                <?php 
                    //Ciclo que imprima columnas por cada categoria existente
                    //Inicia foreach para mostrar todos los platos
                    $resultado = $categoria -> read();
                    //Inicia foreach de readALL
                    foreach($resultado as $categoria):
                ?>

                <div class="col text-center">
                    <a class="text-green" role="button" href="menu.php?id_categoria=<?php echo $categoria["id_categoria"]; ?>"> <?php echo $categoria["categoria"] ?> </a> 
                </div>

                <?php
                    //Termina foreach de readAll
                    endforeach;
                ?>
            </div>
        </div>

        <hr>

        <div class="row p-3">
            <div class="row row-cols-1 row-cols-md-2 g-2">
                <?php 
                    //Inicia foreach para mostrar todos los platos
                    if (isset($_GET["id_categoria"])) {
                        $resultado = $plato -> filtroCategoria($_GET["id_categoria"]);
                    }
                    else {
                        $resultado = $plato -> read();
                    }
                    //Inicia foreach de readALL
                    foreach($resultado as $plato):
                ?>
                <div class="col">
                    <div class="card" >
                        <img style="height:30%" src="<?php echo $plato["foto"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-blue"><?php echo $plato["plato"] ?></h5>
                            <p class="card-text text-green">Precio: <?php echo $plato["precio"] ?>$MXN</p>
                            <hr>
                            <div class="text-center">
                                <!-- Boton para abrir ventana modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalInfo<?php echo $plato['id_plato']; ?>"><i class="fa-solid fa-cart-plus"></i> Agregar el carrito</button>
                                <?php include ("modals/modal-plato.php") ?> 
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    //Termina foreach de readAll
                    endforeach;
                ?>
            </div>
        </div>

    </div>
    <?php include ("footer.php") ?>
</body>
<?php include ("js/boostrap.js") ?>
</html>