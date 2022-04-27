<?php 

    function imprimirActivo($url)
    {
        $archActual = basename($_SERVER['REQUEST_URI'], ".php");

        if ($archActual == $url)
            echo " active";
    }

    //Se toma el nombre del archivo para ponerlo en el titulo del archivo
    function imprimirTitulo(){
        $archActual = basename($_SERVER['REQUEST_URI'], ".php");
        $archActual = ucfirst($archActual);
        echo $archActual;
    }

?>