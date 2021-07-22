<html>
    <head>
        <title>Lista de productos</title>
    </head>
    <body>
        <h1>Lista de productos</h1>
        
        <table>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Talla</th>
                <th>Marca</th>
                <th>Editar</th>
            <tr>

            <?php
                include("conexion.php");

                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "select producto.idproducto, nombre, precio, talla.talla, marca.marca, imagen.url from producto inner join talla on talla.idtalla = producto.idtalla inner join marca on marca.idmarca = producto.idmarca left outer join imagen on imagen.idproducto = producto.idproducto";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["nombre"] . "</td><td><img style='max-width:40px' src='uploads/" . $row["url"] ."'</td><td>" . $row["precio"] . "</td><td>" . $row["talla"] . "</td><td>" . $row["marca"] . "</td><td><a href='index.php?idpro=" . $row["idproducto"] ."'>Editar</a></td></tr>" ;
                }
                } else {
                echo "0 results";
                }
                $conn->close();
            ?>
        </table>
    </body>
</html>