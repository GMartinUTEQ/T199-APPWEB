<html>
    <head>
        <title>
            Registra tu cuenta
        </title>
    </head>
    <body>
        <h1>Registra tu cuenta</h1>
        <form action="registro.php" method="post">
            <table style="width:50%">
                <tr>
                    <td>
                        Usuario:
                    </td>
                    <td>
                        <input type="text" name="usralias"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Escribe tu contraseña:
                    </td>
                    <td>
                        <input type="password" name="usrpassuno"/>
                    </td>
                </tr>
                <tr>
                <td>
                        Escribe de nuevo tu contraseña:
                    </td>
                    <td>
                        <input type="password" name="usrpassdos"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php

    //insertando los datos de mi conexión.
    include("conexion.php");

    //Validando que si me hayan llegado los campos que ocupo.
    if(isset($_REQUEST["usrpassuno"]) && isset($_REQUEST["usrpassdos"])  && isset($_REQUEST["usralias"]))
    {
        //Asignando la información que me llegó del post a variables.
        $usralias = $_REQUEST["usralias"];
        $usrpass1 = $_REQUEST["usrpassuno"];
        $usrpass2 = $_REQUEST["usrpassdos"];

        //Validando que las contraseñas no estén vacías, es decir que si se hayan escrito.
        if(!empty($usrpass1) && !empty($usrpass2) && !empty($usralias) )
        {
            //Validar que las contraseñas sean iguales
            if($usrpass1 === $usrpass2)
            {
                //Validar que no tenga errores de conexión a MySQL
                if($conn->connect_error)
                {
                    echo "Error al conectar a MySQL" . $conn->connect_error;
                    die("");
                }

                //Solo estoy llenando la cadena con el query, no la estoy ejecutando.
                $cadenamysql = "insert into usuario (alias, pass) values('$usralias', '$usrpass1');";
                
                //Ejecutar la consulta y validar que no haya dado error en MySQL
                if($conn->query($cadenamysql) === TRUE)
                {
                   echo "<h1>Usuario registrado</h1>";
                }
                else 
                {
                    echo "Error al registrar la cuenta: " . $conn->error;
                }
            }
            else
            {
                echo "Las contraseñas capturadas no son iguales";
            }
        }
        else
        {
            echo "Favor de escribir las contraseñas";
        }
    }

?>