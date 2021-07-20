<html>
    <head>
        <title>Ejemplo del ciclo While</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head> 
    <body>
        <div>
        <?php
            $aleatorio = rand(1, 100);
            $contador = 1;
            echo "<div><h1>Contar hasta el:$aleatorio</h1></div>";
            while($contador <= $aleatorio)
            {
                echo "<h3>$contador</h3>";
                $contador++;
            }
        ?>
        </div>
    </body>
</html>