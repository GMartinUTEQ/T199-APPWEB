<html>
    <head>
        <title>
            Resetea tu contraseña
        </title>
    </head>
    <body>
        <h1>Resetea tu contraseña</h1>
        <form action="resetapass.php" method="post">
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