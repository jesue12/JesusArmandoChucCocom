<?php

session_start();
include_once 'propel_init_loader.php';

$usu = $_POST["txtUsuario"];
$con = $_POST["txtContrasena"];
/*-----------------------------------*/

$dat = DatosQuery::create()->filterByCorreo($usu)->findOne();
/*-----------------------------------*/
if($dat->getContrasena()==$con)
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

