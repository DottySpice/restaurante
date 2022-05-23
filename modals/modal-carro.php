<!-- Modal para Informacion del plato-->
<div class="modal fade" id="modalCarro<?php echo $plato['id_plato']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Agregar al carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- El formulario enviara el id del platillo y la cantidad que se solicito, asi como su precio -->
            <form class="p-1"  action="carro.php?accion=agregarCarro&id_plato=<?php echo $plato['id_plato'] ?>" method="POST">
                <div class="modal-body text-green">
                    <div class="mb-3">
                        <img style="height:30%" src="<?php echo "../".$plato["foto"] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="mb-3">
                        <b><label class="form-label">Nombre del plato: </label></b>
                        <label  class="form-label"><?php echo $plato['plato']; ?></label>
                    </div>
                    <div class="mb-3">
                        <b><label class="form-label">Descripcion del plato: </label></b>
                        <label class="form-label"><?php echo $plato['descripcion']; ?></label>
                    </div>
                    <div class="mb-3">
                        <b><label class="form-label">Precio del plato: </label></b>
                        <label class="form-label"><?php echo $plato['precio']; ?>$MXN</label>
                    </div>  
                    <hr>
                    <div class="mb-3">
                        <b><label class="form-label">Cantidad a pedir: </label></b>
                        <input name="data[cantidad]" type="number" min="1" max="100">
                    </div>                 
                </div>
                <div class="modal-footer">
                    <!-- Al agregar, se pasara el id del platillo y el id del cliente para poder relacionar el carrito con el cliente -->
                    <input class="btn btn-success" type="submit" value="Agregar al carrito" name="data[enviar]" />
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form> 
        </div>
    </div>
</div>