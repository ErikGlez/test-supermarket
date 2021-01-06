<?php

    if(isset($_POST)){
        require_once "model/producto.php";
        require_once "includes/conexion.php";
    
        $p = new Producto();
    
        $cantidad = $_POST['cantidad'];

        if(is_numeric($cantidad) && $cantidad > 0.4){
            $p->id =$_POST['id'];
            $p->nombre =$_POST['nombre'];
            $p->descripcion =$_POST['descripcion'];
            $p->stock =$_POST['stock'];
            $p->precio =$_POST['precio'];
        
            //verificar si ya existe una lista de compras
            if(isset($_SESSION['carrito'])){
                $carrito = $_SESSION['carrito']; //rescato el carrito
            }else{
                $carrito = array(); //creo el carrito
            }
        
            array_push($carrito, $p);
            $_SESSION['carrito'] = $carrito;  //subo de nuevo el carrito

            $_SESSION['agregadoCarrito'] = "Se ha agregado correctamente.";
        }else{
            $_SESSION['errorCantidad'] = "la cantidad no es valida.";
        }
       
    
      
    }
    header('location: index.php');


//



