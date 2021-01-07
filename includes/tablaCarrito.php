<?php if (isset($_SESSION['carrito']) && !isset($_SESSION['vendedor'])) : 
      $carrito  = $_SESSION['carrito'];
?>

<?php if (count($carrito)>0) : 
      
?>

    <!-- Mensajes de error / exito --->
     <?php if(isset($_SESSION['agregadoCarrito'])) : ?>
                   <div class="bg-success mb-1 p-1">
                   <?=$_SESSION['agregadoCarrito']?>

                   </div> 
                
            <?php elseif(isset($_SESSION['errorCantidad'])): ?>
                <div class="bg-danger  mb-1 p-1">
                   <?=$_SESSION['errorCantidad']?>

                   </div> 
     <?php endif;?>
    <h4 class="bg-warning p-1">Listado de compras:</h4>
   
    <!--cariito-->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">SubTotal</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                 $total=0; // total acumulado del carrito.
                 $i=0; //indice para poder eliminar productos agregados al carrito
                 foreach($carrito as $p):
            ?>
                    <tr>
                         <td><?= $p->id  ?></td>
                        <td><?= $p->nombre  ?></td>
                        <td>$<?= $p->precio ?> pesos</td>
                        <td><?= $p->cantidad ?></td>
                        <td>$<?= $p->subTotal ?> pesos</td>
                        <td>
                            <a href="eliminarProductoCarrito.php?in=<?=$i?>" class="btn bg-warning">Eliminar</a>
                        </td>
                        <?php 
                        $total+=$p->subTotal;
                        $i++;
                        ?>
                    </tr>
                  
            <?php
               endforeach;
            ?>
            <tr>
              <td colspan="4">Total:</td>
              <th colspan="5">$ <?=$total?> pesos.</th>
            </tr>
            


        </tbody>
    </table>

    <hr class="mt-2" size="6" />
    
    <h4 class="bg bg-primary p-1">Realizar compra</h4>
    <hr class="mt-2" size="6" />
    <form action="realizarVenta.php" method="POST">
        <div class="mb-3">
            <input type="hidden" class="form-control" name="total" value="<?=$total?>">
        </div>
        <div class="mb-3">
             <label for="nombre" class="form-label">Nombre</label>
             <input type="text" class="form-control" name="nombre">
         </div>
         <div class="mb-3">
             <label for="apellidos" class="form-label">Apellidos</label>
             <input type="text" class="form-control" name="apellidos">
         </div>
         <div class="mb-3">
             <label for="domicilio" class="form-label">Domicilio</label>
             <input type="text" class="form-control" name="domicilio">
         </div>
         <div class="mb-3">
             <label for="correo" class="form-label">Correo</label>
             <input type="email" class="form-control" name="correo">
         </div>
         <div class="mb-3">
             <label for="telefono" class="form-label">Teléfono</label>
             <input type="text" class="form-control" name="telefono">
         </div>
       
        <input type="submit" class="btn btn-primary" value="Comprar"/>
    </form>



    <?php endif; ?>

<?php endif; ?>

<?php clearError(); ?>
