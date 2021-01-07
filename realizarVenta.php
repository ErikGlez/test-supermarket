<?php

if(isset($_POST)){
    require_once "model/producto.php";
    require_once "includes/conexion.php";
   
    $producto = new Producto();
   
    if(!$_SESSION){
        session_start();
    }

        
    $total = isset($_POST['total']) ? mysqli_real_escape_string($db, $_POST['total']) :false;;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) :false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) :false;;
    $domicilio =  isset($_POST['domicilio']) ? mysqli_real_escape_string($db, $_POST['domicilio']) :false;;
    $correo =  isset($_POST['correo']) ? mysqli_real_escape_string($db, $_POST['correo']) :false;;
    $telefono =  isset($_POST['telefono']) ? mysqli_real_escape_string($db, $_POST['telefono']) :false;;

    $listaProductos = $_SESSION['carrito'];

    $error = array();

     //Array de errores
     $error = array();

     // Validar los datos antes de guardarlos en la basede datos
     if (empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)) {
         $error['nombreCliente'] = "El nombre no es valido";
     }
 
     if (empty($domicilio)) {
         $error['domicilioCliente'] = "El domicilio no es valido";
     }

     if (empty($apellidos) || is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos)) {
        $error['apellidosCliente'] = "El apellido no es valido";
    }

     if (empty($correo)  || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
         $error['correoCliente'] = "El correo no es valido";
     }
 
     if (empty($telefono) || !is_numeric($telefono) || !preg_match("/[0-9]/", $telefono)) {
         $error['telefonoCliente'] = "El teléfono no es valido";
     }

     if (empty($total) || !is_numeric($total)) {
        $error['totalCliente'] = "El total no es valido";
    }

    
     if(count($error)==0){
        // Si no se encontraron errores
        
        // creamos la venta
        $sql = "INSERT INTO ventas VALUES(null, '$nombre', '$apellidos', '$domicilio', '$correo', '$telefono', $total, now());";

        /* */
        //ejecutamos query de la venta
        $save = mysqli_query($db, $sql);

        
        //obtenemos el id maximo de la ventas
        $sqlid = "SELECT max(id) FROM ventas";
        $res = mysqli_query($db, $sqlid);

        $idUltimaVenta = 0;
        if($reg = $res->fetch_array(MYSQLI_NUM)){
            $idUltimaVenta = $reg[0];
        }

        //insert en detalle
        foreach($listaProductos as $producto){
            
            $query = "INSERT INTO detalles VALUES(null,$idUltimaVenta,$producto->id, $producto->cantidad, $producto->subTotal)";

            $saveDetalle = mysqli_query($db, $query);
            

        }

        $carrito = $_SESSION['carrito'];
        session_unset($carrito);


     }else{
         $_SESSION['errorCompraCliente'] = $error;
        
     }

}

header('location: index.php');











?>