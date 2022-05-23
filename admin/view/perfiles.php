    <div class="container">
        <div class="row p-2">
            <div class=" text-center text-blue">
                <h1>Perfil</h1>
            </div>
        </div>
        <hr>

        <div class="row text-center p-3 text-green">
            <?php 
                //Ciclo para mostrar resultado
                $cont=1; 
                foreach($resultado as $usuario):
            ?>
            <div class="col">
                <h3>Informacion de la cuenta</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usuarioInfo<?php echo$usuario["id_usuario"]; ?>"><i class="fa-solid fa-info"></i></button>
            </div>
            <div class="col">
                <h3>Editar cuenta</h3>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editarUsuario<?php echo$usuario["id_usuario"]; ?>"><i class="fa-solid fa-pen"></i></button>
            </div>
            <div class="col">
                <h3>Eliminar cuenta</h3>
                <a class="btn btn-danger" href="perfil.php?accion=delete&id=<?php echo $usuario["id_usuario"];?>&id_persona=<?php echo $usuario["id_persona"];?>" role="button"><i class="fa-solid fa-trash"></i></a>
            </div>

            <?php 
                include ("../modals/modal-editar-usuario-perfil.php");
                include ("../modals/modal-usuario-info.php"); 
                endforeach;
            ?>
        </div>  
    </div>
    <?php include ("../footer.php"); ?>
</body>
<?php include ("../js/boostrap.js") ?>
</html>