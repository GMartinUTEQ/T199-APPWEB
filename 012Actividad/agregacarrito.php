<?php

    session_start();
    if(isset($_REQUEST["idpro"]) && isset($_REQUEST["cantpro"]))
    {
        $_SESSION["carrito"] += array($_REQUEST["idpro"] => $_REQUEST["cantpro"]);
    }
    $_SESSION["CarritoItems"] = count($_SESSION["carrito"]);
    echo "<script>window.location='index.php';</script>";
?>