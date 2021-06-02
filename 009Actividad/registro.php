<html>
    <head>
        <title>Registro de Usuarios</title>
    </head>
    <body>
        <form action="tarjetausuario.php" method="post">
            <table>
                <tr>
                    <td>
                        Nombre Completo:
                    </td>
                    <td>
                        <input type="text" name="usrnombre" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Correo:
                    </td>
                    <td>
                        <input type="email" name="usrcorreo"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Teléfono:
                    </td>
                    <td>
                        <input type="tel" name="usrtelefono"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Usuario:
                    </td>
                    <td>
                        <input type="text" name="usrusuario" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Contraseña:
                    </td>
                    <td>
                        <input type="password" name="usrpass" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Sexo:
                    </td>
                    <td>
                        Hombre:<input type="radio" name="sexo" id="sexo" value="sexoh"/><br/>
                        Mujer:<input type="radio" name="sexo" id="sexo" value="sexom"/><br/>
                        Prefiero no decir:<input type="radio" name="sexo" id="sexo" value="sexond"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Estado de Nacimiento:
                    </td>
                    <td>
                        <select name="edonac" id="edonac"> 
                            <option value="Yucatan">Yucatán</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Guanajuato">Guanajuato</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="submit" value="Guardar"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>