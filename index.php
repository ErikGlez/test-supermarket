<?php require_once 'includes/cabecera.php'; ?>
<div class="container overflow-hidden">
    <div class="row mt-3">
        <div class="col-9">
            <div class="col-12">
                <h1>Productos:</h1>
            </div>
        </div>
        <div class="col-3">
            <div class="col-12">
                <?php if (isset($_SESSION['vendedor'])) : ?>
                    <div class="vendedor-logeado">
                        <p style="text-transform: uppercase;"> <strong><?= $_SESSION['vendedor']['nombre'] . ' ' . $_SESSION['vendedor']['apellidos']; ?></strong></p>
                        <!-- botones -->
                        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <hr class="mt-2" size="10" />
    </div>

    <div class="row mt-2">
        <div class="col-9">
            <div class="col-12">
                <?php require_once 'includes/tablaProductos.php'; ?>
            </div>

        </div>
        <div class="col-3">
            <div class="col-12">
                <?php require_once 'includes/tablaCarrito.php'; ?>
            </div>
            <div class="col-12 p-2" style="border-left: 2px solid #ccc;">

                <?php require_once 'includes/lateral.php'; ?>
            </div>
        </div>
    </div>

    <hr class="mt-2" size="10" />


</div>




</body>

</html>