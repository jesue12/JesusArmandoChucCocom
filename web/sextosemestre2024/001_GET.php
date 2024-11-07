<?php

// POST->formularios   // GET->URL

//  001.php
//  ?
//  edad=17
// &
//  nombre=abel

$v1 = @$_GET["edad"];
$v2 = @$_GET["nombre"];
$v3 = @$_GET["carrera"];


if($v1>17)
{
    $etiqueta = "mayor";
}
else
{
    $etiqueta="menor";
}

for($i=0;$i<$v1;$i++)
{
echo "Hola ".$v2." según tu edad eres ".$etiqueta." de edad<br>";
}

switch ($v3)
{
    case "inf": echo "<br><br>Informática";break;
    case "bio": echo "<br><br>Biología";break;
    case "adm": echo "<br><br>Administración";break;
    case "ige": echo "<br><br>Gestión";break;
    case "agr": echo "<br><br>Agronomía";break;
    default :echo "<br><br>No se ingresó carrera";break;
}

