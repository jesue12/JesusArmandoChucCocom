<?php
session_start();
$error="";
@$error=$_GET["valor"];
switch ($error)
{
    case "error1": echo "error en la contraseña";break;
    case "error2": echo "error en el usuario";break;
    case "error3": echo "para ver la aplicación debe de iniciar sesión";break;
    case "cerrar": session_destroy(); echo "la sesión se cerró correctamente";break;
    default : /*no hago algo*/break;
}


?>
<form action="003_SESSION_verificador.php" method="POST">
    <label>
        Usuario::
        <input type="text" name="txtUsuario" value="" placeholder="Ingresa tu usuario">
    </label><br><br>
    
    <label>
        Contraseña::
        <input type="password" name="txtContrasena" value="" placeholder="Ingresa tu contraseña">
    </label><br><br>
    <input type="submit" value="enviar">
</form>
