<?php
$servername = "localhost";
$username = "sextosemestre";
$password = "emestresexto";
$dbname = "usuarios";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM datos";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    ?>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    <?php
    while($row = $result->fetch_assoc())
    {
            echo '<tr>'
                . '<th scope="row">'.@$row["id"].'</th>'
                . '<td>'.@$row["correo"].'</td>'
                . '<td>'.@$row["contrasena"].'</td>'
                . '<td>'.@$row["nombre"].'</td>'
                . '<td><a href="aplicacion.php?pagina=estudiantesAmod&registro='.@$row["id"].'" class="btn btn-info">M</a></td>'
                . '<td><a href="aplicacion.php?pagina=estudiantesAdelete&registro='.@$row["id"].'" class="btn btn-danger">E</a></td>'
                . '</tr>';
    }
    ?>
    </tbody>
    </table>   
    <?php
}
$conn->close();
?>
<td><a href="aplicacion.php?pagina=estudiantesinsert" class="btn btn-danger">Insertar</a></td>