<!-- Modal para Informacion del plato-->
<div class="modal fade" id="usuarioInfo<?php echo $usuario['id_usuario']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Informacion del usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-green">
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
                <div class=" text-green">
                    <h3>Datos de Usuario</h3>
                    <div class="mb-3">
                        <b><label class="form-label">Rol: </label></b>
                        <label class="form-label"><?php echo $usuario["rol"]; ?></label>
                    </div>  
                    <div class="mb-3">
                        <b><label class="form-label">Correo: </label></b>
                        <label class="form-label"><?php echo $usuario["correo"]; ?></label>
                    </div>  
                </div>
                <hr>
                <div class=" text-green">
                    <h3>Datos personales</h3>
                    <div class="mb-3">
                        <b><label class="form-label">Nombre: </label></b>
                        <label class="form-label"><?php echo $usuario["nombre"]; ?></label>
                    </div>  
                    <div class="mb-3">
                        <b><label class="form-label">Direccion: </label></b>
                        <label class="form-label"><?php echo $usuario["direccion"]; ?></label>
                    </div>  
                    <div class="mb-3">
                        <b><label class="form-label">Codigo postal: </label></b>
                        <label class="form-label"><?php echo $usuario["codigo_postal"]; ?></label>
                    </div>  
                    <div class="mb-3">
                        <b><label class="form-label">Sexo: </label></b>
                        <label class="form-label"><?php echo $usuario["sexo"]; ?></label>
                    </div>  
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>