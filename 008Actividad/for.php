<html>
    <head>
        <title>Ejemplo del ciclo For</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head> 
    <body>
        <div>
        <?php
            for($i = 1; $i<=100; $i++)
            {
                echo "<h3>$i</h3>";
                //echo "<h3>" . $i . "</h3>";
            }
        ?>
        </div>
    </body>
</html>