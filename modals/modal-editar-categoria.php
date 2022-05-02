<!-- Modal para editar-->
<div class="modal fade" id="editarCategoria<?php echo $categoria["id_categoria"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $accion="update"; ?> 
            <form class="p-1"  action="categoria.php?accion=<?php echo $accion;?>&id=<?php echo $categoria["id_categoria"]; ?>" method="POST">
                <div class="modal-body text-green">     
                    <div class="input-group mb-3">
                        <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-tag"></i></span>
                        <input name="data[categoria]"  value="<?php echo $categoria["categoria"];?>" class="form-control" placeholder="Nombre de la categoria">
                    </div>       
                </div>
                <div class="modal-footer">
                    <input class="btn btn-success" type="submit" value="<?php echo "Editar Categoria"; ?>" name="data[enviar]" />
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form> 
        </div>
    </div>
</div>