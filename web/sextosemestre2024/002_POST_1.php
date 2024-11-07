<form action="002_POST_2.php?lenguaje=php" method="POST">
    <label>
        Nombre::
        <input type="text" name="txtNombre" value="xxxxxx" placeholder="Ingresa el nombre aquí">
    </label><br><br>
    
    <label>
        Apellido::
        <input type="text" name="txtApellido" value="yyyyy" placeholder="Ingresa tus apellidos">
    </label><br><br>
    
    <label>
        Edad::
        <input type="text" name="txtEdad" value="zzzzz" placeholder="Ingresa tu edad en años">
    </label><br><br>
    <label>
        Carrera::
    <select name="lstCarrera">
        <option value="bio">Lic. Biología</option>
        <option value="adm">Lic. Administración</option>
        <option value="inf">Ing. Informática</option>
        <option value="ige">Ing. Gestión</option>
        <option value="agr">Ing. Agronomía</option>
    </select>
    </label><br><br>
    
    <input type="submit" value="enviar">
</form>
