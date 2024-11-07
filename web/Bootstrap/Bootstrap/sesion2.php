<?php
session_start();
$usu = @$_POST["usuario"];
$con = @$_POST["contrasena"];


$servername ="localhost";
$username = "info";
$password = "hola";
$dbname = "informacion";

/// Create connection
@$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from registro where usuario ='".$usu."' && Contrasena='".$con."'";
@$result = $conn->query($sql);
$correcto=false;
  
if ($result->num_rows > 0) {
   $correcto=true;

}
$conn->close();



if($correcto)
{
   
       header('location:aplicacion.php');
       $_SESSION["usuario"] = $v1;
    }
     else
    {
       //echo "Credenciales incorrectas";
         header('location: sesion.php?valor=error1');
    } 

 


