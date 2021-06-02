<html>
    <head>
        <title>SAT</title>
    </head>
    <body>
        <?php

            $dia  = date("d");
            if($dia <= 10)
            {
                echo "<center><h1 style='color:green'>SITIO HABILITADO, FAVOR DE ENTRAR</h1></center>";
            }
            else
            {
                echo "<center><h1 style='color:red'>SITIO INHABILITADO, NO OLVIDE PRESENTAR SU COMPLEMENTARIA EL PRÓXIMO MES</h1></center>";
            }

        ?>
    </body>
</html>