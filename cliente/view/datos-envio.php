<div class="container">
        <div class="row p-2">
            <div class=" text-center text-blue">
                <h1>Suma total del Carro</h1>
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
                    </tr>
                </tbody>
            </table>
        </div>  
    
        <hr>
        <div class="row p-2">
            <div class=" text-center text-blue">
                <h1>Datos envio</h1>
                <?php //foreach ($resultado as $usuario): ?>
                    <form class="p-1" method="POST" action="carro.php?accion=pagar">
                        <div class="modal-body text-green">     
                            <div class="text-green">
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                    <input class="form-control" placeholder="Nombre completo" value="<?php echo $_SESSION["nombre"] ?>" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>
                                    <input name="data[direccion]" class="form-control" placeholder="Direccion" value="<?php echo $_SESSION["direccion"] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-envelopes-bulk"></i></span>
                                    <input name="data[codigo_postal]" class="form-control" placeholder="Codigo postal" value="<?php echo $_SESSION["codigo_postal"] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text text-green" for="inputGroupSelect01"><i class="fa-solid fa-cash-register"></i></label>
                                    <select class="form-select" name="data[metodo_pago]">
                                        <option selected>Selecciona metodo de pago...</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Tarjeta">Tarjeta</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input class="btn btn-success" type="submit" value="Pagar" name="data[enviar]" />     
                    </form> 
                <?php //endforeach; ?>
            </div>
        </div>
    </div>
    <?php include ("../footer.php"); ?>
</body>
<?php include ("../js/boostrap.js") ?>
</html>