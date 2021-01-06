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

    <h1><?=count($carrito)?></h1>
    <!--cariito-->





<?php endif; ?>

<?php clearError(); ?>