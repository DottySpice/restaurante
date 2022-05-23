<?php
    //Con esto contamos los productos agregados del carrito
    $cantidad_total = 0;
    if (isset($_SESSION['carrito'])) {
        $mi_carro = $_SESSION['carrito'];
        foreach ($mi_carro as $carro) {
            $cantidad = $carro['cantidad'];
            $cantidad_total += $cantidad;
        }
    }
?>