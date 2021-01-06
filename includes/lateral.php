
<div>
    <h4>Agregar producto</h4>
    <hr class="mt-2" size="6" />
    <form action="registrarProducto.php" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
            
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion">
            
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="stock" class="form-control" name="stock" id="stock" aria-describedby="stockDesc">
            <div id="stockDesc" class="form-text">Stock del producto.</div>
        
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio"  >
           
        
        </div>
        <input type="submit" class="btn btn-primary" value="Guardar"/>
    </form>
</div>

