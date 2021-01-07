<?php if (isset($_SESSION['carrito'])) : 
      $carrito  = $_SESSION['carrito'];
   
?>

    <!-- Mensajes de error / exito --->
     <?php if(isset($_SESSION['agregadoCarrito'])) : ?>
                   <div class="bg-success">
                   <?=$_SESSION['agregadoCarrito']?>

                   </div> 
                
            <?php elseif(isset($_SESSION['errorCantidad'])): ?>
                <div class="bg-danger">
                   <?=$_SESSION['errorCantidad']?>

                   </div> 
     <?php endif;?>
    <h4 class="bg-warning">Listado de compras:</h4>
   
    <!--cariito-->
    <table class="table">
        <thead>
            <tr>
                
                <th scope="col">Nombre</th>
                <th scope="col">Stock actual</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">SubTotal</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                 foreach($carrito as $p):
            ?>
                    <tr>
                        <td><?= $p->nombre  ?></td>
                        <td><?= $p->stock?></td>
                        <td>$<?= $p->precio ?> pesos</td>
                        <td><?= $p->cantidad ?></td>
                        <td>$<?= $p->subTotal ?> pesos</td>
                        <td>Eliminar</td>
                    </tr>
            <?php
               endforeach;
            ?>
            


        </tbody>
    </table>

    <hr class="mt-2" size="6" />



<?php endif; ?>

<?php clearError(); ?>