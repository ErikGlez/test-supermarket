<?php
   

    if(isset($_POST)){
        require_once "model/producto.php";
        require_once "includes/conexion.php";
        require_once "includes/helpers.php";
    
        $p = new Producto();
        $pro = new Producto();
    
        $cantidad = $_POST['cantidad'];

        if(is_numeric($cantidad) && $cantidad > 0.4 && $cantidad<= $_POST['stock']){
            $p->id =$_POST['id'];
            $p->nombre =$_POST['nombre'];
            $p->descripcion =$_POST['descripcion'];
            $p->stock =$_POST['stock'];
            $p->precio =$_POST['precio'];
            $p->cantidad = $_POST['cantidad'];
            $p->subTotal = $p->precio * $p->cantidad;
        

            $tieneStock = tieneStock($db, $p->id, $p->stock, $p->cantidad);

            if($tieneStock){
                //verificar si ya existe una lista de compras
                if(isset($_SESSION['carrito'])){
                    $carrito = $_SESSION['carrito']; //rescato el carrito
                }else{
                    $carrito = array(); //creo el carrito
                } 

                $sumaStocks =0;
                foreach($carrito as $pro){
                    if($pro->id== $p->id){
                        $sumaStocks += $p->cantidad;
                    }
                }

                $sumaStocks +=$p->cantidad;

                if($p->stock >= $sumaStocks){
                    //tiene stock
                    array_push($carrito, $p);
                    $_SESSION['carrito'] = $carrito;  //subo de nuevo el carrito
                    $_SESSION['agregadoCarrito'] = "Se ha agregado correctamente.";
                }else{
                    $_SESSION['noStock'] = "No hay stock suficiente.";
                }
    
               
            }else{
                //no tiene stock
                $_SESSION['noStock'] = "No hay stock suficiente.";
            }


            
           
        }else{
            $_SESSION['errorCantidad'] = "La cantidad no es valida.";
        }
       
    
      
    }
    header('location: index.php');


//



