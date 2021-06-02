<html>
    <head>
        <title>Tipos de Datos</title>
    </head>
    <body>
        <?php

            $entero = 199;
            $cadena = "T199";
            $decimal = 3.1416;
            $booleano = true;
            $aleatorio = rand(1, 10);

            echo "
                <table>
                    <tr>
                        <td>Entero</td>
                        <td>$entero</td>
                    </tr>
                    <tr>
                        <td>Cadena</td>
                        <td>$cadena</td>
                    </tr>
                    <tr>
                        <td>Decimal</td>
                        <td>$decimal</td>
                    </tr>
                    <tr>
                        <td>Booleano</td>
                        <td>$booleano</td>
                    </tr>
                    <tr>
                        <td>Aleatorio</td>
                        <td>$aleatorio</td>
                    </tr>
                </table>
            ";
        ?>
    </body>
</html>