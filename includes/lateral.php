
<div>
<?php if(isset($_SESSION['vendedor'])): ?>
        
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


 <?php endif; ?>  <!-- si existe vendedor logeado-->

 <?php if(!isset($_SESSION['vendedor'])): ?>  <!-- si no existe un vendedor logeado-->
    <?php if(isset($_SESSION['CompraExitosa'])) : ?>
                   <div class="bg-primary">
                   <?=$_SESSION['CompraExitosa']?>
                   </div> 
                   <hr class="mt-2" size="6" /> 
      <?php elseif(isset($_SESSION['errorCompraCliente'])): ?>
                <div class="bg-danger">
                   <strong> <?=$_SESSION['errorCompraCliente']?></strong>
                   <?php
                    echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombreCliente') : ''; 
                    echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidoCliente') : '';
                    echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'domicilioCliente') : ''; 
                    echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'correoCliente') : '';
                    echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'telefonoCliente') : '';
                    echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'totalCliente') : '';
                    ?> 

                   </div> 
     <?php endif;?>

   
<div id="login" class="mt-3">
            <h5>Identificate</h5>
            <p style="font-size: 12px;">¿Eres vendedor?, inicia sesión para acceder al panel de vendedor</p>
             <?php if(isset($_SESSION['error-login']) && !isset($_SESSION['vendedor'])): ?>
                <div class="bg bg-danger">
                    <?= $_SESSION['error-login']; ?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="POST">
               
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="correo" id="correo">
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" id="contrasena">
                </div>
                <input type="submit" class="btn btn-primary" value="Entrar" />
  </form>
</div>  <!-- fin form login-->
 <?php endif; ?>
   
   
    <?php clearError(); ?>
</div>

