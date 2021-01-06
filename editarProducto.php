<?php

if (isset($_POST)) {
    require_once "includes/conexion.php";



    // Recoger valores del formulario
    $id = $_POST['id'];
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) :false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) :false;
    $stock = isset($_POST['stock']) ? mysqli_real_escape_string($db, $_POST['stock']) :false;
    $precio = isset($_POST['precio']) ? mysqli_real_escape_string($db, $_POST['precio']) :false;

    //Array de errores
    $errorActualizar = array();

    if(empty($nombre)){
        $errorActualizar['nombre'] ="El nombre no es valido";
    }

    if(empty($descripcion)){
        $errorActualizar['descripcion'] ="La descripción no es valida";
    }

    if(empty($stock) && !is_numeric($stock)){
        $errorActualizar['stock'] ="El stock no es valido. Introduzca un valor numerico (por ejemplo: 6, 6.0 )";
    }

    if(empty($precio) && !is_numeric($stock)){
        $errorActualizar['precio'] ="El precio no es valido.Introduzca un valor numerico (por ejemplo: 6, 6.0 )";
    }

    if(count($errorActualizar)==0){
     

        $sql = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', stock = '$stock', precio = '$precio' WHERE id =  $id;";
   

        $save = mysqli_query($db, $sql);

        if ($save) {
            $_SESSION['exitoActualizar'] = "Se ha actualizado el producto";
            
        } else {
            
            $_SESSION['errorActualizar'] = "fallo al actualizar";
        }
    
       

    }else{
       

        $_SESSION['errorActualizar'] = $errorActualizar;

    }
    

}

header('location: index.php');





?>