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
if(@$_GET["tarea"]=="guardar")
{
    $conn2 = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn2->connect_error) {
      die("Error de conexión: " . $conn2->connect_error);
    }


    $sql = "UPDATE datos SET "
    . "correo='".$_POST["cor"]."', "
    . "contrasena='".$_POST["con"]."', "
    . "nombre='".$_POST["nom"]."' "
    . "WHERE id=".$registro;

    
  
    if ($conn2->query($sql) === TRUE) {
      echo '<div class="alert alert-success" role="alert">Registro actualizado!</div>';
    } else {
      echo '<div class="alert alert-danger" role="alert">' . $conn2->error.'</div>';
    }

$conn2->close();



    
}
///////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM datos WHERE id=".$registro;
//echo $sql;
@$result = $conn->query($sql);


if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $correo=$row["correo"];
        $contrasena=$row["contrasena"];
        $nombre=$row["nombre"];
    }
}
$conn->close();
?>
<form action="aplicacion.php?pagina=estudiantesAmod&registro=<?php echo $registro; ?>&tarea=guardar" method="POST">
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
            <input type="submit" value='Actualizar' class="btn btn-warning">
        </div>
    </div>
    
</div>
</form>