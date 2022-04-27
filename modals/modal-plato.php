<!-- Modal para Informacion del plato-->
<div class="modal fade" id="modalInfo<?php echo $plato['id_plato']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Agregar al carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-green">
                <div class="mb-3">
                    <img style="height:30%" src="<?php echo $plato["foto"] ?>" class="card-img-top" alt="...">
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Nombre del plato: </label></b>
                    <label class="form-label"><?php echo $plato['plato']; ?></label>
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
                    <input type="number" id="" name="" min="1" max="100">
                </div>                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-solid fa-cart-plus"></i> Agregar al carrito</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>