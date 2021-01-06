
<div>
    <!-- mostrar errores -->
    <?php if(isset($_SESSION['exito'])) : ?>
                   <div class="bg-success">
                   <?=$_SESSION['exito']?>

                   </div> 
                
            <?php elseif(isset($_SESSION['error']['general'])): ?>
                <div class="bg-danger">
                   <?=$_SESSION['error']['general']?>

                   </div> 
     <?php endif;?>
    <h4>Agregar producto</h4>
    <hr class="mt-2" size="6" />
    <form action="registrarProducto.php" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
            <?php echo isset($_SESSION['error']) ? mostrarError($_SESSION['error'],'nombre') : ''; ?> 
            
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion">
            <?php echo isset($_SESSION['error']) ? mostrarError($_SESSION['error'],'descripcion') : ''; ?> 
            
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="stock" class="form-control" name="stock" id="stock" aria-describedby="stockDesc">
            <div id="stockDesc" class="form-text">Stock del producto.</div>
            <?php echo isset($_SESSION['error']) ? mostrarError($_SESSION['error'],'stock') : ''; ?> 
        
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio"  >
            <?php echo isset($_SESSION['error']) ? mostrarError($_SESSION['error'],'precio') : ''; ?> 
           
        
        </div>
        <input type="submit" class="btn btn-primary" value="Guardar"/>
    </form>
    <?php clearError(); ?>
</div>

