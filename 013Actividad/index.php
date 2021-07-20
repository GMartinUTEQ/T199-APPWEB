<html>
    <head>
        <title>Iput Select</title>
    </head> 
    <body>
        <form>
            ID Producto:<br/>
            <input type="text" id="idpro" name="idpro" readonly/>
            Nombre producto:<br/>
            <input type="text" id="nompro" name="nompro"/><br/>
            Precio producto:<br/>
            <input type="text" id="prepro" name="prepro"/><br/>
            Marca:<br/>
            <select id="marcapro" name="marcapro">
                <opcion value="1">American Eeagle</option>
                <option value="2">GAP</option>
                <option value="3">Pineda Covalín</option>
            </select><br/>
            Talla:<br/>
            <select id="tallapro" name="tallapro">
                <opcion value="1">Chica</option>
                <option value="2">Mediana</option>
                <option value="3">Grande</option>
                <option value="4">Extra Grande</option>
            </select><br/>
            <input type="submit" value="Guardar"/>s
        </form>
    </body>
</html>