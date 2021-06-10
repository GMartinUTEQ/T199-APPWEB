<html>
    <head>
        <title>Lista de usuarios</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>Lista de usuarios del sistema.</h1>
            <p>Sistema de Administración X</p>
        </div>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="">Menú</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse  navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link"  href="usurarios2.php">Lista de usuarios</a></li>
                    <li class="nav-item "><a class="nav-link"  href="index.html">Cerrar Sesión</a></li>
                    <li class="nav-item "><a class="nav-link"  href="registro.php">Alta de usuario</a></li>
                    <li class="nav-item "><a class="nav-link"  href="http://google.com">Ir a Google</a></li>
                </ul>
            </div>
        </nav>

        <div class="container" style="margin-top:60">
            <div class="row">
                <div class="col-sm-2" >
                </div>
                <div class="col-sm-8 text-center" >
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
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2" >
                </div>
            </div>
            
        </div>

        <div class="jumbotron text-center" style="margin-bottom:0"> 
            <p>@T199 Todos los derechos reservados | 2021</p>
        </div>

    </body>
</html>