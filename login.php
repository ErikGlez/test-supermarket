<?php
require_once 'includes/conexion.php';

// recoger los datos del formulario
if(isset($_POST)){


     //borrar sesion de error
     if(isset(  $_SESSION['error-login'])){
        session_unset($_SESSION['error-login']);
    }

    
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];


    // consulta para comprobar las credenciales del usuario

    $sql = "SELECT * FROM vendedores WHERE correo = '$correo'";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login)==1){
        $vendedor = mysqli_fetch_assoc($login);
    
        // comprobar la contraseña /cifrar
        // $verify = password_verify($contrasena, $vendedor['contrasena']);

        if($vendedor){
           

            //utilizar una sesion para guadar los datos del usuario logeado
            $_SESSION['vendedor']=$vendedor;

           
           
        }else{
                // si algo falla enviar unn sesion con el fallo
                $_SESSION['error-login'] = "Datos incorrectos.";
        }
      
    }else{
        //mensaje de error
        $_SESSION['error-login'] = "Usuario no registrado, no se encontraron coincidencias.";
    }

}

 header('Location: index.php');






?>