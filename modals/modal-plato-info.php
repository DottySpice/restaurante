<!-- Modal para Informacion del plato-->
<div class="modal fade" id="platoInfo<?php echo $plato['id_plato']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Informacion del plato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-green">
                <div class="mb-3">
                    <img style="height:30%" src="<?php echo "../".$plato["foto"] ?>" class="card-img-top" alt="...">
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Nombre del plato: </label></b>
                    <label class="form-label"><?php echo $plato['plato']; ?></label>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Categoria del plato: </label></b>
                    <label class="form-label"><?php echo $plato['categoria']; ?></label>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Descripcion del plato: </label></b>
                    <label class="form-label"><?php echo $plato['descripcion']; ?></label>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Precio del plato: </label></b>
                    <label class="form-label"><?php echo $plato['precio']; ?>$MXN</label>
                </div>                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>