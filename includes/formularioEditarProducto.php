<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    $nombre = "";
}

if (isset($_GET['descripcion'])) {
    $descripcion = $_GET['descripcion'];
} else {
    $descripcion = "";
}

if (isset($_GET['stock'])) {
    $stock = $_GET['stock'];
} else {
    $stock = "";
}
if (isset($_GET['precio'])) {
    $precio = $_GET['precio'];
} else {
    $precio = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>TEST SUPERMARKET</title>
</head>

<body>
    <header>
        <div id="cabecera">
            <div class="row">
                <div class="col-1 logo">
                    <img src="../assets/img/logo.png" alt="logo SUPERMARKET">
                </div>
                <div class="col-11 titulo">
                    <h1>SUPERMARKET</h1>
                    </>
                </div>
            </div>
        </div>
    </header>

    <div class="container overflow-hidden">
        <div class="col-6 mt-2">

            <h4>Actualizar producto</h4>
            <hr class="mt-2" size="6" />
            <form action="../editarProducto.php" method="POST">
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="id" id="id" value="<?= $id ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $nombre ?>">


                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?= $descripcion ?>">


                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="stock" class="form-control" name="stock" id="stock" aria-describedby="stockDesc" value="<?= $stock ?>">
                    <div id="stockDesc" class="form-text">Stock del producto.</div>


                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" id="precio" value="<?= $precio ?>">



                </div>
                <input type="submit" class="btn btn-primary" value="Guardar" />
            </form>

        </div>

    </div>

</body>

</html>