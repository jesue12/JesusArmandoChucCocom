<?php
$registro="";
$registro = @$_GET["registro"];

$correo="";
$contrasena="";
$nombre="";

$servername = "localhost";
$username = "sextosemestre";
$password = "emestresexto";
$dbname = "usuarios";

///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
if(@$_GET["tarea"]=="insertar")
{
    $correo=$_POST["cor"];
    $contrasena=$_POST["con"];
    $nombre=$_POST["nom"];


    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
    }


    $sql = 'INSERT INTO datos (correo, contrasena, nombre) VALUES ("'.$correo.'", "'.$contrasena.'", "'.$nombre.'")';

    
  
    if ($conn->query($sql) === TRUE) {
      echo '<div class="alert alert-success" role="alert">Insertardo!</div>';
    } else {
      echo '<div class="alert alert-danger" role="alert">' . $conn->error.'</div>';
    }

$conn->close();



    
}
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