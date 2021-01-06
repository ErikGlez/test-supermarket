<?php

if (isset($_POST)) {
    require_once "includes/conexion.php";

    if(!$_SESSION){
        session_start();
    }

    // Recoger valores del formulario
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) :false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) :false;
    $stock = isset($_POST['stock']) ? mysqli_real_escape_string($db, $_POST['stock']) :false;
    $precio = isset($_POST['precio']) ? mysqli_real_escape_string($db, $_POST['precio']) :false;

    //Array de errores
    $error = array();

    //validar datos antes de guardarlos
    if(empty($nombre)){
        $error['nombre'] ="El nombre no es valido";
    }

    if(empty($descripcion)){
        $error['descripcion'] ="La descripción no es valida";
    }

    if(empty($stock) && !is_numeric($stock)){
        $error['stock'] ="El stock no es valido. Introduzca un valor numerico (por ejemplo: 6, 6.0 )";
    }

    if(empty($precio) && !is_numeric($stock)){
        $error['precio'] ="El precio no es valido.Introduzca un valor numerico (por ejemplo: 6, 6.0 )";
    }

    if(count($error)==0){
     //guardar producto
     //insertar producto
    $sql = "INSERT INTO productos VALUES(null, '$nombre' , '$descripcion', '$stock', '$precio');";

    $save = mysqli_query($db, $sql);

        if ($save) {
            $_SESSION['exito'] = "El registro se ha completado con éxito";
        } else {
            
            $_SESSION['error']['general'] = "fallo al guardar el producto";
        }

    }else{
        //validaciones encontraron errores, no se guarda el producto

        $_SESSION['error'] = $error;

    }

}

header('location: index.php');


?>