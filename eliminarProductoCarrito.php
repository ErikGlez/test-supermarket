<?php
 
  $index = $_GET['in'];
  session_start();



  if(isset($_SESSION['carrito'])){
      $carrito = $_SESSION['carrito'];
     
      unset($carrito[$index]); // elimino el indice
      $carrito = array_values($carrito); //reordenar 

      $_SESSION['carrito'] = $carrito; //actualizo el carrito

      if(count($carrito)==0){
          session_unset($carrito);
      }

  }

  header('location: index.php');