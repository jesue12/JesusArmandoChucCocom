<?php
$registro="";
$registro = @$_GET["registro"];

$correo="";
$contrasena="";
$nombre="";



///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
if(@$_GET["tarea"]=="insertar")
{
    $correo=$_POST["cor"];
    $contrasena=$_POST["con"];
    $nombre=$_POST["nom"];

$est = EstudiantesQuery::create()->findPk($registro);
    $est->setMatricula($_POST["txtcorreo"]);
    $est->setNombres($_POST["txtcontrasena"]);
    $est->setApellidos($_POST["txtnombre"]);
    if($est->validate())
        {
            $est->save();
            $msg="<div class='alert alert-success'><strong>Registro correcto!</strong> se han guardado correctamente la información.</div>";
        }
    else{
        $msg="<div class='alert alert-danger'>";
        $msg.="<strong>¡Error al procesar!</strong> ERROR:";
        $msg.="<ul>";
        foreach($est->getValidationFailures() as $error){
            $msg.="<li>".$error->getMessage()."</li>";
        }
        $msg.="</ul>";
        $msg.="</div>";
    }
}

    

// Con
$est2 = EstudiantesQuery::create()->findPk($registro);
$matricula = $est2->getMatricula();
$nombres = $est2->getNombres();
$apellidos = $est2->getApellidos();
echo $msg;





?>
<form action="aplicacion.php?pagina=estudiantesinsert&tarea=insertar" method="POST">
<div class="container">
    <div class="row">
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input name='cor' value="<?php echo $correo; ?>" type="email" class="form-control" id="correo" placeholder="aqui debe de ir un correo">
        </div>
        <div class="mb-3">
            <label for="contr" class="form-label">Contraseña</label>
            <input name='con' value="<?php echo $contrasena; ?>" type="text" class="form-control" id="contr" placeholder="ingresa la contraseña">
        </div>
        <div class="mb-3">
            <label for="contr" class="form-label">Nombre completo</label>
            <input name='nom' value="<?php echo $nombre; ?>" type="text" class="form-control" id="contr" placeholder="Ingresa tu nombre">
        </div>
        <div class="mb-3">
            <input type="submit" value='Ingresar' class="btn btn-warning">
        </div>
    </div>
    
</div>
</form>