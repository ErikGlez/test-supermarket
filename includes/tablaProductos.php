<?php if (isset($_SESSION['vendedor'])) : ?>
    <!-- si existe un vendedor logeado-->
     
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $productos = obtenerProductos($db);

            if (!empty($productos)) :
                while ($producto = mysqli_fetch_assoc($productos)) :
            ?>


                    <tr>
                        <th scope="row"><?= $producto['id'] ?></th>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['descripcion'] ?></td>
                        <td><?= $producto['stock'] ?></td>
                        <td>$<?= $producto['precio'] ?> pesos</td>
                        <td>
                            <a href="eliminarProducto.php?id=<?= $producto['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estas seguro de eliminar este producto?')">Eliminar</a>
                            <a href="includes/formularioEditarProducto.php?id=<?= $producto['id'] ?>&nombre=<?= $producto['nombre'] ?>&descripcion=<?= $producto['descripcion'] ?>&stock=<?= $producto['stock'] ?>&precio=<?= $producto['precio'] ?>" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
            <?php
                endwhile;
            endif;
            ?>


        </tbody>
    </table>

<?php endif; ?>

<?php if (!isset($_SESSION['vendedor'])) : ?>
    <!-- si no existe un vendedor logeado-->

    <table class="table">
        <thead>
            <tr>

                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Agregar al carrito</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $productos = obtenerProductos($db);

            if (!empty($productos)) :
                while ($producto = mysqli_fetch_assoc($productos)) :
            ?>


                    <tr>

                        <td scope="row"><?= $producto['nombre'] ?></td>
                        <td><?= $producto['descripcion'] ?></td>
                        <td><?= $producto['stock'] ?></td>
                        <td>$<?= $producto['precio'] ?> pesos</td>
                        <td>
                            <form action="agregarCarrito.php" method="POST">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="id"  value="<?=$producto['id'] ?>" >
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="nombre"  value="<?=$producto['nombre'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="descripcion"  value="<?=$producto['descripcion'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="stock"  value="<?=$producto['stock'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="precio"  value="<?=$producto['precio'] ?>">
                            </div>
                            <div class="col-6 mb-1">
                            <input type="text" class="form-control" style="height: 25px; font-size:15px" name="cantidad" />
                            </div>
                            <div>
                            <input type="submit" class="btn btn-success" style="font-size:12px;" value="Agregar" />
                            </div>
                          
                           
                            </form>
                        </td>
                    </tr>
            <?php
                endwhile;
            endif;
            ?>


        </tbody>
    </table>
    <?php if(isset($_SESSION['noStock'])) : ?>
                   <div class="bg-danger mb-1 p-1">
                   <?=$_SESSION['noStock']?>
                   </div> 
     <?php endif;?>
   

<?php endif; ?>


