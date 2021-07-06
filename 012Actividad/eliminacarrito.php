<?php
session_start();
if(isset($_REQUEST["idpro"]))
{
    unset($_SESSION["carrito"][$_REQUEST["idpro"]]);
}
$_SESSION["CarritoItems"] = count($_SESSION["carrito"]);
echo "<script>window.location='carrito.php';</script>";

?>