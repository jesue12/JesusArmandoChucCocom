<!DOCTYPE html>
<html>
<head>
   <h1 style="color: green;">Encuesta</h1>



<form action="resultados.php" method="POST">
    <label>
        Nombre=
        <input type="text" name="txtNombre" placeholder="Ingresa el nombre aquí">
    </label><br><br>
    
    <label>
        Apellido=
        <input type="text" name="txtApellido"  placeholder="Ingresa tus apellidos">
    </label><br><br>
    

        Carrera=
    <select name="lstCarrera">
        <option value="bio">Lic. Biología</option>
        <option value="adm">Lic. Administración</option>
        <option value="inf">Ing. Informática</option>
        <option value="ige">Ing. Gestión</option>
        <option value="agr">Ing. Agronomía</option>
    </select>
    </label><br><br>

    <label><br>
        ¿Que vacuna tienes?:
        <label><br>
    <input type="checkbox" id="moderna" name="vacunas[]" value="moderna">
        <label for="moderna">Moderna</label><br>

        <input type="checkbox" id="pfizer" name="vacunas[]" value="pfizer">
        <label for="pfizer">Pfizer</label><br>

        <input type="checkbox" id="astra" name="vacunas[]" value="astra">
        <label for="astra">Astra</label><br>

        <input type="checkbox" id="cansino" name="vacunas[]" value="cansino">
        <label for="cansino">Cansino</label><br>

        <label><br>
        ¿te gusta programar?:
        <label><br>
        
        <input type="radio" id="si" name="programar" value="si">
        <label for="si">Sí</label><br>

        <input type="radio" id="no" name="programar" value="no">
        <label for="no">No</label><br>

        <label><br>
            Género:
            <label><br>
            <input type="radio" id=Masculino" name="genero" value="Masculino">
            <label for=Masculino">Masculino</lable><br>
            <input type="radio" id=Femenino" name="genero" value="Femenino">
            <label for=Femenino">Femenino</lable><br>

     <label><br>
        Lenguajes de programación que usas:
        <label><br>
    <input type="checkbox" id="Java" name="lenguaje[]" value="Java">
        <label for="Java">Java</label><br>
        <input type="checkbox" id="c#" name="lenguaje[]" value="c#">
        <label for="c#">c#</label><br>
        <input type="checkbox" id="php" name="lenguaje[]" value="php">
        <label for="php">php</label><br>
        <input type="checkbox" id="c++" name="lenguaje[]" value="c++">
        <label for="c++">c++</label><br>
        <input type="checkbox" id="python" name="lenguaje[]" value="python">
        <label for="python">python</label><br>
       


    <input type="submit" value="enviar">
</form>