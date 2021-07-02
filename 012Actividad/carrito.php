<?php
session_start();
echo "<h1>Carrito de compras</h1>";

echo "<table><tr><th>idProducto</th><th>Cantidad</th><th>importe</th></tr>";

$total = 0;

foreach($_SESSION["carrito"] as $x => $x_value) {
    echo "<tr><td>" . $x . "</td><td>" . $x_value . "</td><td>" . $x_value * 100  . "</td></tr>";
    $total += $x_value * 100;
}

echo "</table>";

echo "<h3>" . $total . "</h3>";

?>