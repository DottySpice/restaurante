    <div class="container">
        <div class="row p-2">
            <div class=" text-center text-blue">
                <h1>Platos</h1>
            </div>
        </div>
        <hr>
        <div class="p-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarPlato"><i class="fa-solid fa-plus"></i> Agregar</button>
            <?php include ("../modals/modal-agregar-plato.php"); ?>
        </div>

        <div class="row text-center">
            <table class="table table-bordered table-striped"> 
                <thead>
                    <tr class=" text-green">
                        <th scope="col">Numero Plato</th>
                        <th scope="col">Nombre Plato</th>
                        <th scope="col">Precio Plato</th>
                        <th scope="col">Informacion</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        //Ciclo para mostrar resultado
                        $cont=1; 
                        foreach($resultado as $plato):
                    ?>
                    <tr>
                        <th class="text-green" scope="row"><?php echo $cont; $cont++?></th>
                        <td><?php echo $plato["plato"]; ?></td>
                        <td><?php echo $plato["precio"]; ?>$MXN</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#platoInfo<?php echo$plato["id_plato"]; ?>"><i class="fa-solid fa-info"></i></button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editarPlato<?php echo$plato["id_plato"]; ?>"><i class="fa-solid fa-pen"></i></button>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="plato.php?accion=delete&id=<?php echo $plato["id_plato"]; ?>" role="button"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php 
                        include ("../modals/modal-editar-plato.php");
                        include ("../modals/modal-plato-info.php"); 
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