<html>
    <head>
        <title>Iput Select</title>
    </head> 
    <body>
        <form action="altaproducto.php" method="post">
            ID Producto:<br/>
            <input type="text" id="idpro" name="idpro" readonly/><br/>
            Nombre producto:<br/>
            <input type="text" id="nompro" name="nompro"/><br/>
            Precio producto:<br/>
            <input type="text" id="prepro" name="prepro"/><br/>
            Marca:<br/>
            <select id="marcapro" name="marcapro">
                <option value="1">American Eeagle</option>
                <option value="2">GAP</option>
                <option value="3">Pineda Covalín</option>
            </select><br/>
            Talla:<br/>
            <select id="tallapro" name="tallapro">
                <option value="1">Chica</option>
                <option value="2">Mediana</option>
                <option value="3">Grande</option>
                <option value="4">Extra Grande</option>
            </select><br/>
            <input type="submit" value="Guardar"/>
        </form>
    </body>
</html>