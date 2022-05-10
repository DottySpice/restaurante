    <div class="container">
        <div class="row p-2">
            <div class=" text-center text-blue">
                <h1>Usuarios</h1>
            </div>
        </div>
        <hr>
        <div class="p-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarUsuario"><i class="fa-solid fa-plus"></i> Agregar</button>
            <?php include ("../modals/modal-agregar-usuario.php"); ?>
        </div>

        <div class="row text-center">
        <table class="table table-bordered table-striped"> 
                <thead>
                    <tr class=" text-green">
                        <th scope="col">Numero Usuario</th>
                        <th scope="col">Nombre Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Informacion</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        //Ciclo para mostrar resultado
                        $cont=1; 
                        foreach($resultado as $usuario):
                    ?>
                    <tr>
                        <th class="text-green" scope="row"><?php echo $cont; $cont++?></th>
                        <td><?php echo $usuario["nombre"]; ?></td>
                        <td><?php echo $usuario["correo"]; ?></td>
                        <td><?php echo $usuario["rol"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usuarioInfo<?php echo$usuario["id_usuario"]; ?>"><i class="fa-solid fa-info"></i></button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editarUsuario<?php echo$usuario["id_usuario"]; ?>"><i class="fa-solid fa-pen"></i></button>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="usuario.php?accion=delete&id=<?php echo $usuario["id_usuario"];?>&id_persona=<?php echo $usuario["id_persona"];?>" role="button"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php 
                        include ("../modals/modal-editar-usuario.php");
                        include ("../modals/modal-usuario-info.php"); 
                    ?>
                    <?php 
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>  
    </div>
    <?php include ("../footer.php"); ?>
</body>
<?php include ("../js/boostrap.js") ?>
</html>