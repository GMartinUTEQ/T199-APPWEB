<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sistema de administración T199</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include("menu.html") ?>

        <!-- Page Content  -->
        <div id="content">

            <?php include("header.php") ?>

            <h2>Lista de usuarios</h2>
            <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th>ID Usuario</th>
                            <th>Alias</th>
                            <th>Ultimo Cambio</th>
                            <th>Eliminar</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                        <tbody>
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
                                                <i class='fas fa-trash-alt fa-2x'></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href='altausuario.php?alias=" . $row["alias"] . "'>
                                                    <i class='fas fa-edit fa-2x'></i>
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
                        </tbody>
                    </table>

            <div class="line"></div>

            <!--<h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h3>Lorem Ipsum Dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            -->
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
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
            else{
                echo "<script>alert('Usuario eliminado exitosamente');window.location='usuarios.php';</script>";
            }
        }
    }

?>