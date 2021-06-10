<html>
    <head>
        <title>Usuarios</title>
    </head>
    <body>
        <h1>Lista de usuarios del sistema</h1>
        <table style="width:50%">
            <tr>
                <th>ID Usuario</th>
                <th>Alias</th>
                <th>Ultimo Cambio</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            <?php
                include("conexion.php");

                if($conn->connect_error)
                {
                    echo "Error de conexión a MySQL";
                    die("");
                }

                $cadena = "select idusuario, alias, ultcambio from usuario";
                
                $resultado = $conn->query($cadena);

                if($resultado->num_rows > 0)
                {
                    
                    while($row = $resultado->fetch_assoc())
                    {
                        echo "<tr>
                                <td>" . $row["idusuario"] . "</td>
                                <td>" . $row["alias"] . "</td>
                                <td>" . $row["ultcambio"] . "</td>
                                <td>
                                    <a href='usuarios.php?idusuario=" . $row["idusuario"] . "' >
                                        <img style='max-height:30px' src='imgs/borrar.png'/>
                                    </a>
                                </td>
                                <td>
                                    <a href='reseteapass.php?alias=" . $row["alias"] . "'>
                                        <img style='max-height:30px' src='imgs/editar.png' />
                                    </a>
                                </td>
                            </tr>";
                    }
                }
                else
                {
                    echo "<tr><td colspan='4'>No se obtuvieron resultados</td></tr>";
                }

            ?>
        </table>
    </body>
</html>

<?php

    //insertando los datos de mi conexión.
    include("conexion.php");
    //Validando que si me hayan llegado los campos que ocupo.
    if(isset($_REQUEST["idusuario"]))
    {
        //Asignando la información que me llegó del post a variables.
        $idusuario = $_REQUEST["idusuario"]; //9
        //Validando que las contraseñas no estén vacías, es decir que si se hayan escrito.
        if(!empty($idusuario))
        {
            //Validar que no tenga errores de conexión a MySQL
            if($conn->connect_error)
            {
                echo "Error al conectar a MySQL" . $conn->connect_error;
                die("");
            }
            //Solo estoy llenando la cadena con el query, no la estoy ejecutando.
            $cadenamysql = "delete from usuario where idusuario = $idusuario;";
            //Ejecutar la consulta y validar que no haya dado error en MySQL
            if($conn->query($cadenamysql) != TRUE)
            {
                echo "Error al eliminar al usuario: " . $conn->error;
            }
        }
    }

?>