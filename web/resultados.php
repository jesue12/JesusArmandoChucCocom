<!DOCTYPE html>
<html>
<head>
    <title>Resultados de la encuesta</title>
    <style>
        h1 {
            color: orange;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["txtNombre"])) {
        $nombre = $_POST["txtNombre"];
    } else {
        $nombre = "No especificado";
    }

    if (!empty($_POST["txtApellido"])) {
        $apellido = $_POST["txtApellido"];
    } else {
        $apellido = "No especificado";
    }

    if (!empty($_POST["lstCarrera"])) {
        $carrera = $_POST["lstCarrera"];
    } else {
        $carrera = "No especificada";
    }

    if (!empty($_POST["vacunas"])) {
        $vacunas = implode(", ", $_POST["vacunas"]);
    } else {
        $vacunas = "No especificadas";
    }

    if (!empty($_POST["programar"])) {
        $programar = $_POST["programar"];
    } else {
        $programar = "No especificado";
    }

    if (!empty($_POST["genero"])) {
        $genero = $_POST["genero"];
    } else {
        $genero = "No especificado";
    }

    if (!empty($_POST["lenguaje"])) {
        $lenguajes = implode(", ", $_POST["lenguaje"]);
    } else {
        $lenguajes = "Ningún lenguaje especificado";
    }

    echo "<h1>Resultados de la encuesta</h1>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellido: $apellido</p>";
    echo "<p>Carrera: $carrera</p>";
    echo "<p>Vacunas: $vacunas</p>";
    echo "<p>¿Te gusta programar?: $programar</p>";
    echo "<p>Género: $genero</p>";
    echo "<p>Lenguajes de programación que usas: $lenguajes</p>";
} else {
    echo "<h1>No se recibieron datos del formulario</h1>";
}
?>

</body>
</html>
