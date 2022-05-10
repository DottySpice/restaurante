<!-- Modal para editar-->
<div class="modal fade" id="editarUsuario<?php echo $usuario["id_usuario"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Editar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $accion="update"; ?> 
            <form class="p-1"  action="usuario.php?accion=<?php echo $accion;?>&id=<?php echo $usuario["id_usuario"];?>&id_persona=<?php echo $usuario["id_persona"];?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body text-green"> 
                    <div class="text-green">
                        <div class="mb-3">
                            <?php 
                                if ($usuario["id_rol"] == 1) {
                                echo '<i class="fa-solid fa-user fa-xl"></i>';
                                }
                                else {
                                    echo '<i class="fa-solid fa-user-tie fa-xl"></i>';
                                } 
                            ?>
                        </div>
                        <hr>
                        <h3>Datos de usuario</h3> 
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email"  value="<?php echo $usuario["correo"];?>" class="form-control" placeholder="Correo" disabled>
                        </div> 
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                            <input type="password" value="<?php echo $usuario["contrasena"];?>"  class="form-control" placeholder="Contrasena" disabled>
                        </div>   
                        <div class="input-group mb-3">
                            <label class="input-group-text text-green" for="inputGroupSelect01"><i class="fa-solid fa-tag"></i></label>
                            <select class="form-select" name="data[id_rol]">
                                <option 
                                    <?php
                                        if(isset($usuario["id_rol"])){ echo "selected"; }
                                    ?> 
                                    value="<?php echo $usuario["id_rol"] ?>">
                                    <?php echo $usuario["rol"] ?> 
                                </option>
                                <?php 
                                    foreach($roles as $rol):
                                ?>
                                <option 
                                    value="<?php echo $rol["id_rol"] ?>">
                                    <?php echo $rol["rol"] ?> 
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>         
                    </div>
                    <hr>
                    <div class="text-green">
                        <h3>Datos personales</h3>  
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input name="data[nombre]" value="<?php echo $usuario["nombre"];?>" class="form-control" placeholder="Nombre completo">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>
                            <input name="data[direccion]" value="<?php echo $usuario["direccion"];?>" class="form-control" placeholder="Direccion">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-envelopes-bulk"></i></span>
                            <input name="data[codigo_postal]" value="<?php echo $usuario["codigo_postal"];?>" class="form-control" placeholder="Codigo postal">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text text-green" for="inputGroupSelect01"><i class="fa-solid fa-tag"></i></label>
                            <select class="form-select" name="data[sexo]">
                                <option selected>Selecciona tu sexo...</option>
                                <option value="M"  <?php if($usuario["sexo"] == "M") {echo "selected";} ?> >Masculino</option>
                                <option value="F" <?php if($usuario["sexo"] == "F") {echo "selected";} ?> >Femenino</option>
                                <option value="NA" <?php if($usuario["sexo"] == "NA") {echo "selected";} ?> >Prefiero no decirlo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-success" type="submit" value="<?php echo "Editar Usuario"; ?>" name="data[enviar]" />
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form> 
        </div>
    </div>
</div>