<?php
session_start();
echo "<h1>Carrito de compras</h1>";

echo "<table><tr><th>Imagen</th><th>idProducto</th><th>Nombre de producto</th><th>Cantidad</th><th>importe</th><th>Eliminar</th></tr>";

$total = 0;

foreach($_SESSION["carrito"] as $x => $x_value) {
    echo "<tr><td><img style='max-height:60px' src='" . imagenproducto($x) . "' /></td><td>" . $x . "</td><td>" . nombreproducto($x) . "</td><td>" . $x_value . "</td><td>" . precioproducto($x)  . "</td><td><a href='eliminacarrito.php?idpro=$x'>Eliminar</a></td></tr>";
    $total += $x_value * 100;
}

echo "</table>";

echo "<h3>" . $total . "</h3>";


function nombreproducto($idprod)
{
    include("conexion.php");
                    
    if($conn->connect_error)
    {
        echo "Error de conexión a MySQL";
        die("");
    }

    $cadena = "select * from producto where idproducto =" . $idprod;
    
    $resultado = $conn->query($cadena);

    if($resultado->num_rows > 0)
    {
        
        while($row = $resultado->fetch_assoc())
        {
            return $row["nombreproducto"];
        }
    }
}

function precioproducto($idprod)
{
    include("conexion.php");
                    
    if($conn->connect_error)
    {
        echo "Error de conexión a MySQL";
        die("");
    }

    $cadena = "select * from producto where idproducto =" . $idprod;
    
    $resultado = $conn->query($cadena);

    if($resultado->num_rows > 0)
    {
        
        while($row = $resultado->fetch_assoc())
        {
            return $row["precioproducto"];
        }
    }
}

function imagenproducto($idprod)
{
    include("conexion.php");
                    
    if($conn->connect_error)
    {
        echo "Error de conexión a MySQL";
        die("");
    }

    $cadena = "select * from producto where idproducto =" . $idprod;
    
    $resultado = $conn->query($cadena);

    if($resultado->num_rows > 0)
    {
        
        while($row = $resultado->fetch_assoc())
        {
            return $row["urlproducto"];
        }
    }
}

?>