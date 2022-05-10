<!-- Modal para agregar nueva categoria-->
<div class="modal fade" id="agregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
        <div class="modal-content " >
            <div class="modal-header" style="background-color: #592321 ;">
                <h5 class="modal-title text-blue " id="exampleModalLabel">Nuevo usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form class="p-1" method="POST" action="usuario.php?accion=registro">
                <div class="modal-body text-green">     
                    <div class="text-green">
                        <h3>Datos de usuario</h3> 
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="data[correo]" class="form-control" placeholder="Correo" >
                        </div> 
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                            <input type="password" name="data[contrasena]" class="form-control" placeholder="Contrasena">
                        </div>          
                    </div>
                    <hr>
                    <div class="text-green">
                        <h3>Datos personales</h3>  
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input name="data[nombre]" class="form-control" placeholder="Nombre completo">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>
                            <input name="data[direccion]" class="form-control" placeholder="Direccion">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text-green" id="basic-addon1"><i class="fa-solid fa-envelopes-bulk"></i></span>
                            <input name="data[codigo_postal]" class="form-control" placeholder="Codigo postal">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text text-green" for="inputGroupSelect01"><i class="fa-solid fa-tag"></i></label>
                            <select class="form-select" name="data[sexo]">
                                <option selected>Selecciona tu sexo...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="NA">Prefiero no decirlo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-success" type="submit" value="Registrar" name="data[enviar]" />     
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancelar</button>
                </div>
            </form> 
        </div>
    </div>
</div>