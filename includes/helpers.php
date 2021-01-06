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


?>