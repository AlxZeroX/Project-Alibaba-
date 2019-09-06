<?php
    session_start(); 
    if (!isset($_SESSION["usuario"]))
        header("Location: login.php");

    if ($_SESSION["tipoUsuario"]=="ADMIN")
?>