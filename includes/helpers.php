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
    $_SESSION['error']= null;

    $clear = session_unset();
  }

  if(isset($_SESSION['error-login'])){
    $_SESSION['error-login']= null;

    $clear = session_unset();
  }

  if(isset($_SESSION['exito'])){
    $_SESSION['exito']= null;

    session_unset();
  }

  return $clear;
}


?>