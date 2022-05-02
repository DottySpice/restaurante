<!-- Modal para agregar nueva categoria-->
<div class="modal fade" id="agregarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Nueva Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $accion="create"; ?> 
            <form class="p-1"  action="categoria.php?accion=<?php echo $accion; ?>" method="POST">
                <div class="modal-body text-green">     
                    <div class="mb-3 ">
                        <div class="form-group has-feedback">
                            <i class="fa-solid fa-tag form-control-feedback"></i>
                            <input name="data[categoria]"  class="form-control" placeholder="Nombre de la categoria">
                        </div>
                    </div>        
                </div>
                <div class="modal-footer">
                    <input class="btn btn-success" type="submit" value="<?php echo " Agregar Categoria"; ?>" name="data[enviar]" />
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancelar</button>
                </div>
            </form> 
        </div>
    </div>
</div>