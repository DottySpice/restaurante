<div class="container">
        <div class="row p-2">
            <div class=" text-center text-blue">
                <h1>Modificar Carro</h1>
            </div>
        </div>
        <hr>

        <div class="row text-center">
            <table class="table table-bordered table-striped"> 
                <thead>
                    <tr class=" text-green">
                        <th scope="col">Numero Pedido</th>
                        <th scope="col">Nombre Plato</th>
                        <th scope="col">Precio Plato</th>
                        <th scope="col">Cantidad a Pedir</th>
                        <th scope="col">Total</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        //Ciclo para mostrar resultado
                        $total_pagar = 0;
                        for ($i = 0; $i < count($mi_carro); $i++) { 
                        //foreach($mi_carro as $carro):
                    ?>
                    <tr>
                        <th class="text-green" scope="row"><?php echo $i;?></th>
                        <td><?php echo $mi_carro[$i]["plato"]; ?></td>
                        <td><?php echo $mi_carro[$i]["precio"]; $precio = $mi_carro[$i]["precio"]; ?>$MXN</td>
                        <td><?php echo $mi_carro[$i]["cantidad"]; $total = $precio * $mi_carro[$i]["cantidad"]; ?></td>
                        <td><?php echo $total?>$</td>
                        <td>
                            <a class="btn btn-danger" href="carro.php?accion=eliminarProducto&id_producto=<?php echo $i ?>" role="button"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        //endforeach;
                        $total_pagar += $total;
                        }
                    ?>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Total a pagar</th>
                        <th scope="col"><?php echo $total_pagar?>$</th>
                        <th scope="col"></th>
                    </tr>
                </tbody>
            </table>
        </div>  
    
        <hr>
        <div class="row p-2">
            <div class=" text-center text-blue">
                <a class="btn btn-success" href="../cliente/carro.php?accion=datosEnvio"><div></div>Continuar compra</a> 
            </div>
        </div>
    </div>
    <?php include ("../footer.php"); ?>
</body>
<?php include ("../js/boostrap.js") ?>
</html>