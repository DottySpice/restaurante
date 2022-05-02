    <div class="container">
        <div class="row p-2">
            <div class=" text-center text-blue">
                <h1>Categorias</h1>
            </div>
        </div>
        <hr>
        <div class="p-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarCategoria"><i class="fa-solid fa-plus"></i> Agregar</button>
            <?php include ("../modals/modal-agregar-categoria.php"); ?>
        </div>

        <div class="row text-center">
            <table class="table table-bordered table-striped"> 
                <thead>
                    <tr class=" text-green">
                        <th scope="col">Numero Categoria</th>
                        <th scope="col">Nombre Categoria</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        //Ciclo para mostrar resultado
                        $cont=1; 
                        foreach($resultado as $categoria):
                    ?>
                    <tr>
                        <th class="text-green" scope="row"><?php echo $cont; $cont++?></th>
                        <td><?php echo $categoria["categoria"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editarCategoria<?php echo$categoria["id_categoria"]; ?>"><i class="fa-solid fa-pen"></i></button>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="categoria.php?accion=delete&id=<?php echo $categoria["id_categoria"]; ?>" role="button"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php include ("../modals/modal-editar-categoria.php"); ?>
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