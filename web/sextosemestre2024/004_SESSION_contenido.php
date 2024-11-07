<?php
$pag="";
$pag=@$_GET["pagina"];
switch ($pag)
{
    case "estudiantes": include_once '004_SESSION_PagEstudiantes.php';break;
    case "materias":  include_once '004_SESSION_PagMaterias.php';break;
    case "carreras":  include_once '004_SESSION_PagCarreras.php';break;
    case "modalidades":  include_once '004_SESSION_PagModalidades.php';break;
    default : echo "Bienvenido, página inicial"; break;
}


?>