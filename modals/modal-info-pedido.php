<!-- Modal para agregar nueva categoria-->
<div class="modal fade" id="pedidoInfo<?php echo $pedido['id_pedido_detalle']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Informacion del pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-green">
                <?php
                    require_once("../class/usuarios.class.php");
                    $id_pedido_detalle = $pedido['id_pedido_detalle'];
                    $resultado = $usuario -> info_pedido($id_pedido_detalle);

                    foreach ($resultado as $pedido_info){     
                ?>
                <div class="mb-3">
                    <b><label class="form-label">Nombre del plato: </label></b>
                    <label class="form-label"><?php echo $pedido_info['articulo']; ?></label>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Precio del plato: </label></b>
                    <label class="form-label"><?php echo $pedido_info['precio'];?>$</label>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Cantidad a pedir: </label></b>
                    <label class="form-label"><?php echo $pedido_info['cantidad'];?></label>
                </div>
                <hr>
                <?php
                    }
                ?>          
            </div>

            <div class="modal-footer">   
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
            </div>
        </div>
    </div>
</div>
