<div class="container">
        <div class="row p-2">
            <div class=" text-center text-blue">
                <h1>Pedidos</h1>
            </div>
        </div>
        <hr>

        <div class="row text-center">
            <table class="table table-bordered table-striped"> 
                <thead>
                    <tr class=" text-green">
                        <th scope="col">Fecha</th>
                        <th scope="col">ID pedido</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Direccion de entrega</th>
                        <th scope="col">Total</th>
                        <th scope="col">Informacion</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        //Ciclo para mostrar resultado
                        $cont = 1; 
                        foreach($resultado as $pedido):
                    ?>
                    <tr>
                        <td><?php echo $pedido["fecha"]; ?></td>
                        <td><?php echo $pedido["id_pedido_detalle"]; ?></td>
                        <td><?php echo $pedido["estado"]; ?></td>
                        <td><?php echo $pedido["direccion"]; ?></td>
                        <td><?php echo $pedido["total"];?>$</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pedidoInfo<?php echo $pedido["id_pedido_detalle"]; ?>"><i class="fa-solid fa-info"></i></button>
                        </td>
                    </tr>
                    <?php 
                        include ("../modals/modal-info-pedido.php"); 
                    ?>
                    <?php 
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>  
    </div>
    <?php include ("../footer.php"); ?>
</body>
<?php include ("../js/boostrap.js") ?>
</html>