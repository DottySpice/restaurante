<!-- Modal para editar-->
<div class="modal fade" id="editarPlato<?php echo $plato["id_plato"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Editar Plato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $accion="update"; ?> 
            <form class="p-1"  action="plato.php?accion=<?php echo $accion;?>&id=<?php echo $plato["id_plato"]; ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body text-green"> 
                    <div class="mb-3">
                        <img style="height:30%" src="<?php echo "../".$plato["foto"] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-plate-wheat"></i></span>
                        <input name="data[plato]" value="<?php echo $plato["plato"];?>" class="form-control" placeholder="Nombre del plato">
                    </div>          
                    <div class="input-group mb-3">
                        <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-info"></i></span>
                        <textarea name="data[descripcion]" class="form-control" placeholder="Descripcion del plato"><?php echo $plato["descripcion"];?></textarea>
                    </div> 
                    <div class="input-group mb-3">
                        <input name="data[precio]" value="<?php echo $plato["precio"];?>" class="form-control" placeholder="Precio del plato">
                        <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text text-green" for="inputGroupSelect01"><i class="fa-solid fa-tag"></i></label>
                        <select class="form-select" name="data[id_categoria]">
                            <option 
                                <?php
                                    if(isset($plato["id_categoria"])){ echo "selected"; }
                                ?> 
                                value="<?php echo $plato["id_categoria"] ?>">
                                <?php echo $plato["categoria"] ?> 
                            </option>
                            <?php 
                                foreach($categorias as $categoria):
                            ?>
                            <option 
                                value="<?php echo $categoria["id_categoria"] ?>">
                                <?php echo $categoria["categoria"] ?> 
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>  
                    <div class="input-group mb-3">
                        <label class="input-group-text text-green" for="inputGroupSelect01"><i class="fa-solid fa-camera"></i></label>
                        <input class="form-control" type="file" name="foto"/>
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