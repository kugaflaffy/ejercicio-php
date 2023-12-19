<?php 
    session_start();
    if (isset($_SESSION["usuario"])) {
       session_destroy(); //para destruir la sesion una vez terminemos
    }
    header('Location: login.php'); //y asi nos lleva el login
?>