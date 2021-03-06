<?php


function obtenerProductos($conexion){
    $sql = "SELECT * FROM productos ORDER BY nombre ASC;";
    $productos =mysqli_query($conexion, $sql);
  
    $resultado = array();
  
    if($productos && mysqli_num_rows($productos) >=1 ){
      $resultado = $productos;
    }
    return $resultado;
  
  }

  function tieneStock($conexion, $id, $stock, $cantidad){
    $sql = "SELECT stock FROM productos WHERE id= $id";

    $res =mysqli_query($conexion, $sql);
  
    $stockActual =0;
    if($reg = $res->fetch_array(MYSQLI_NUM)){
      $stockActual = $reg[0];
    }

    return $stockActual >= $cantidad;
  
  }

  function actualizarStock($conexion,$id, $stockAdescontar){

    $sql = "SELECT stock FROM productos WHERE id= $id";
    $stockActual =0;
    $res =mysqli_query($conexion, $sql);
    if($reg = $res->fetch_array(MYSQLI_NUM)){
      $stockActual = $reg[0];
    }

    $stockActual -= $stockAdescontar;

    $query = "UPDATE productos SET stock = $stockActual WHERE id = $id";
    $res =mysqli_query($conexion, $query);
    
  }

function mostrarError($error, $campo){
  $alert = '';
  if(isset($error[$campo]) && !empty($campo)){
    $alert = '<div class="bg-danger">'.$error[$campo].'</div>';
  }

  return $alert;
}


function clearError(){
  $clear = false;

  if(isset($_SESSION['error'])){
    $clear = $_SESSION['error']= null;
  }

  if(isset($_SESSION['error-login'])){
    $clear =  $_SESSION['error-login']= null;
  }

  if(isset($_SESSION['exito'])){
   $clear=  $_SESSION['exito']= null;

  }
  
  if(isset($_SESSION['agregadoCarrito'])){
    $clear=  $_SESSION['agregadoCarrito']= null;
 
   }
  
  if(isset($_SESSION['errorCarrito'])){
    $clear = $_SESSION['errorCarrito']= null;
  }

  return $clear;
}



?>