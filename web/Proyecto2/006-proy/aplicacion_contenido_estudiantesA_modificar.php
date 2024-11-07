<?php
$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $matricula = $_POST["txtMatricula"];
    $carrera = $_POST["txtCarrera"];
    $nombres = $_POST["txtNombres"];
    $apellidos = $_POST["txtApellidos"];

    $est = new Estudiantes();
    $est->setMatricula($matricula);
    $est->setCarrera($carrera);
    $est->setNombres($nombres);
    $est->setApellidos($apellidos);

    if ($est->validate()) {
        $est->save();
        
        $msg = "<div class='alert alert-success'><strong>Registro insertado!</strong> Registro guardado.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>";
        $msg .= "<strong>Error al procesar!</strong> revise los problemas:";
        $msg .= "<ul>";
        foreach ($est->getValidationFailures() as $error) {
            $msg .= "<li>".$error->getMessage()."</li>";
        }
        $msg .= "</ul>";
        $msg .= "</div>";
    }
}
?>

<?php if (!empty($msg)) {
    echo $msg;
} ?>

<form action="Aplicacion.php?pagina=estudiantesinsert" method="POST">
    <div class="container">
    <div class="row">
        <div class="mb-3">
            <label for="matricula" class="form-label">Matricula</label>
            <input name='txtMatricula' type="txt" class="form-control" id="matricula" placeholder="Ingresa la matricula">
        </div>
        <div class="mb-3">
            <label for="carrera" class="form-label">Carrera</label>
            <select name='txtCarrera' class="form-select" id="carrera">
                <option value="bio">Biología</option>
                <option value="adm">Administración</option>
                <option value="inf">Informática</option>
                <option value="ige">Ingeniería Gestión</option>
                <option value="agr">Agronomía</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input name='txtNombres' type="text" class="form-control" id="nombres" placeholder="Ingresa nombres">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input name='txtApellidos' type="text" class="form-control" id="apellidos" placeholder="Ingresa apellidos">
        </div>
        <div class="mb-3">
            <input type="submit" value='Insertar' class="btn btn-success">
        </div>
    </div>
</div>
</form>
