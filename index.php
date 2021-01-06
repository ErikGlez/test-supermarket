<?php require_once 'includes/cabecera.php'; ?>
<div class="container overflow-hidden">
<div class="mt-3"> 
        <h1>Productos:</h1>
    <hr class="mt-2" size="10" />
</div>

<div class="row mt-2">
    <div class="col-9">
        <div class="col-12">
            <?php require_once 'includes/tablaProductos.php'; ?>
        </div>
    </div>
    <div class="col-3">
        <div class="col-12 p-3" style="border-left: 2px solid #ccc;">
           
            <?php require_once 'includes/lateral.php'; ?>
        </div>
    </div>
</div>

<hr class="mt-2" size="10" />


</div>




</body>

</html>