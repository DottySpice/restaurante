<?php 
    ob_start();
?>
    <table class="table table-bordered table-striped"> 
        <thead>
            <tr class=" text-green">
                <th scope="col">Fecha</th>
                <th scope="col">ID pedido</th>
                <th scope="col">Estado</th>
                <th scope="col">Direccion de entrega</th>
                <th scope="col">Total</th>
                <th scope="col">Informacion</th>
                <th scope="col">PDF</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                //Ciclo para mostrar resultado
                $cont = 1; 
                foreach($resultado as $pedido):
            ?>
            <tr>
                <td><?php echo $pedido["fecha"]; ?></td>
                <td><?php echo $pedido["id_pedido_detalle"]; ?></td>
                <td><?php echo $pedido["estado"]; ?></td>
                <td><?php echo $pedido["direccion"]; ?></td>
                <td><?php echo $pedido["total"];?>$</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pedidoInfo<?php echo $pedido["id_pedido_detalle"]; ?>"><i class="fa-solid fa-info"></i></button>
                </td>
                <td>
                    <form class="p-1"  action="plato.php?accion=pdf&<?php echo $pedido["id_pedido_detalle"]; ?>" method="POST">
                        <input class="btn btn-success" type="submit" value="<?php echo "Generar PDF"; ?>" name="data[enviar]" />
                    </form>
                </td>
            </tr>
            <?php 
                include ("../modals/modal-info-pedido.php"); 
            ?>
            <?php 
                endforeach;
            ?>
        </tbody>
    </table>
<?php 
    $nombrepdf = "pedido.pdf";
    require_once '../../vendor2/autoload.php';

    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    
    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf -> loadHtml(ob_get_clean()); 
    
    $dompdf->set_paper('a4', 'portrait');
    // Render the HTML as PDF
    $dompdf -> render();
    $pdf = $dompdf -> output();
    $filename = $nombrepdf;
    file_put_contents($filename, $pdf);
    $dompdf -> stream($filename);
    exit();
?>