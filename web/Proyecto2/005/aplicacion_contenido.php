<?php
$pag="";
$pag=@$_GET["pagina"];
switch ($pag)
{
    case "estudiantesA": include_once 'aplicacion_contenido_estudiantesA.php';break;
    case "estudiantesAmod": include_once 'aplicacion_contenido_estudiantesA_modificar.php';break;
    case "estudiantesAdelete": include_once 'aplicacion_contenido_estudiantesA_delete.php';break;
    case "estudiantesinsert": include_once 'aplicacion_contenido_estudiantesA_insert.php';break;
    case "estudiantesAF": include_once 'aplicacion_contenido_estudiantesAF.php';break;
    case "materias":  include_once '004_SESSION_PagMaterias.php';break;
    case "carreras":  include_once '004_SESSION_PagCarreras.php';break;
    case "modalidades":  include_once '004_SESSION_PagModalidades.php';break;
    default : echo "Bienvenido, página inicial"; break;
}
?>