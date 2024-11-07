<?php
$v1 = @$_POST["txtNombre"];
$v2 = @$_POST["txtApellido"];
$v3 = @$_POST["txtEdad"];
$v4 = @$_POST["lstCarrera"];
$v5 = @$_GET["lenguaje"];

if($v3>17)
{
    $etiqueta = "mayor";
}
else
{
    $etiqueta="menor";
}

for($i=0;$i<$v3;$i++)
{
echo "Hola ".$v1." ".$v2." según tu edad eres ".$etiqueta." de edad y estás usando ".$v5."<br>";
}

switch ($v4)
{
    case "inf": echo "<br><br>Informática";break;
    case "bio": echo "<br><br>Biología";break;
    case "adm": echo "<br><br>Administración";break;
    case "ige": echo "<br><br>Gestión";break;
    case "agr": echo "<br><br>Agronomía";break;
    default :echo "<br><br>No se ingresó carrera";break;
}