
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre(s)</th>
            <th scope="col">Descripción</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $productos = obtenerProductos($db);
           
            if(!empty($productos)):
                while($producto = mysqli_fetch_assoc($productos)):
        ?>
       
        
        <tr>
            <th scope="row"><?=$producto['id']?></th>
            <td><?=$producto['nombre']?></td>
            <td><?=$producto['descripcion']?></td>
            <td><?=$producto['stock']?></td>
            <td>$<?=$producto['precio']?> pesos</td>
            <td>
            <a href="#" class="btn btn-danger">Eliminar</a>
            <a href="#" class="btn btn-primary">Editar</a>
            </td>
        </tr>
        <?php
            endwhile;
        endif;
         ?>
       
        
    </tbody>
</table>