<?php
session_start();
$usu = @$_POST["txtUsuario"];
$con = @$_POST["txtContrasena"];
/*-----------------------------------*/
$servername = "localhost";
$username = "sextosemestre";
$password = "emestresexto";
$dbname = "usuarios";

// Create connection
@$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM datos where correo='".$usu."' && contrasena='".$con."'";
//echo $sql;
$result = $conn->query($sql);
$correcto=false;
if ($result->num_rows > 0) {
  $correcto=true;
}
$conn->close();
/*-----------------------------------*/
   if($correcto)
    {
       //echo "Bienvenido";
       $_SESSION["usuario"] = $usu;
       header('location: aplicacion.php');
       
    }
     else
    {
       //echo "Credenciales incorrectas";
         header('location: index.php?valor=error1');
    }




//  abel + estrella