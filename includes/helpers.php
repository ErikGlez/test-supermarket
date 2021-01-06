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

  return $clear;
}



?>