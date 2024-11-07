<?php
session_start();
$v1 = @$_POST["txtUsuario"];
$v2 = @$_POST["txtContrasena"];

if($v1 =="abel")
{
   if($v2 =="estrella")
    {
       //echo "Bienvenido";
       header('location: 003_SESSION_aplicacion.php');
       $_SESSION["usuario"] = $v1;
    }
     else
    {
       //echo "Credenciales incorrectas";
         header('location: 003_SESSION_login.php?valor=error1');
    } 
}
 else
{
    //echo "Credenciales incorrectas";
     header('location: 003_SESSION_login.php?valor=error2');
}



//  abel + estrella