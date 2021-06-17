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
                    $cadenamysql = "insert into usuario (alias, pass) values('$usralias', md5('$usrpass1'));";
                    
                    //Ejecutar la consulta y validar que no haya dado error en MySQL
                    if($conn->query($cadenamysql) === TRUE)
                    {
                        echo "<script>alert('Usuario registrado exitosamente');window.location='usuarios.php';</script>";
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
        else
        {
            echo "No se encontraron datos.";
        }
    

?>
