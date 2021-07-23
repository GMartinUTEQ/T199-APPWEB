<html>
    <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    </head>
    <body>
    <div class="card" style="width:80%; margin-top:40px; margin-left:25px">
        <div class="card-header">Reporte de visitas</div>
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
                    $urlimagen = "noimage.png";
                    if(!is_null($row["url"]) && $row["url"] != "")
                    {
                        $urlimagen = $row["url"];
                    }
                    echo "<tr><td>" . $row["nombre"] . "</td><td><a href='uploads/" . $urlimagen ."' target='_blank'><img style='max-width:40px' src='uploads/" . $urlimagen ."'/></a></td><td>" . $row["precio"] . "</td><td>" . $row["talla"] . "</td><td>" . $row["marca"] . "</td><td><a href='index.php?idpro=" . $row["idproducto"] ."'>Editar</a></td></tr>" ;
                }
                } else {
                echo "0 results";
                }
                $conn->close();
            ?>
        <div class="card-body">Content</div>
        <div class="card-footer">Derechos reservados @gmartin @MorrisCharts</div>
    </div>
    </body>
</html>