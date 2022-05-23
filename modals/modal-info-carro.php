<!-- Modal para agregar nueva categoria-->
<div class="modal fade" id="infoCarro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Contenido del carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-green">
                <?php
                    //Se pregunta si el carrito existe, Si existe se pasa a un array
                    if (isset($_SESSION['carrito'])) {
                        $mi_carro = $_SESSION['carrito'];
                        $total_pedido = 0;
                        //Foreach para imprimir los datos del carro en label
                        foreach ($mi_carro as $carro){     
                ?>
                <div class="mb-3">
                    <b><label class="form-label">Nombre del plato: </label></b>
                    <label class="form-label"><?php echo $carro['plato']; ?></label>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Precio del plato: </label></b>
                    <label class="form-label"><?php echo $carro['precio']; $precio = $carro['precio'];?>$</label>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Cantidad a pedir: </label></b>
                    <label class="form-label"><?php echo $carro['cantidad']; $total_pedido += $carro['cantidad'] * $precio?></label>
                </div>
                <hr>
                <?php
                        }
                    }
                    //Si no hay productos en el carro, se imprime el mensaje correspondiente
                    else {
                        $total_pedido = 0; 
                ?> 
                <div class="mb-3">
                    <h3 class=" text-green">Aun no agregas productos al carrito</h3>
                </div>   
                <?php
                    } 
                ?>     
                <div class="mb-3">
                    <b><label class="form-label">Total del pedido:  </label></b>
                    <label class="form-label"><?php echo $total_pedido ?>$</label>
                </div>       
            </div>

            <div class="modal-footer">   
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                <a class="btn btn-danger" href="../cliente/carro.php?accion=eliminarCarro"><div></div>Eliminar Carrito</a> 
                <a class="btn btn-success" href="../cliente/carro.php?accion=modificarCarro"><div></div>Continuar Compra</a> 
            </div>
        </div>
    </div>
</div>