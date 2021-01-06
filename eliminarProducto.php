<?php
require_once "includes/conexion.php";


if(isset($_GET['id'])){

    //obtenemos el id que viene por parametro en la url
    $producto_id = $_GET['id'];

    $sql = "DELETE FROM productos WHERE id = $producto_id;";
    $borrar = mysqli_query($db, $sql);
}



header('location: index.php');