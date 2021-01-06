<?php
session_start();

if(isset($_SESSION['vendedor'])){
    session_destroy();

}

header('Location: index.php');

?>