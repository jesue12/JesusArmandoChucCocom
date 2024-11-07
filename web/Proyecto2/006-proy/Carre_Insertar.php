<?php
$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $carreras = $_POST["txtCarreras"];
    $semestres = $_POST["txtSemestres"];
    $id = $_POST["txtid"];

    $carrera = new Carreras();
    $carrera->setCarreras($carreras);
    $carrera->setSemestres($semestres);
    $carrera->setId($id);

    if ($carrera->validate()) {
        $carrera->save();
        
        $msg = "<div class='alert alert-success'><strong>Registro insertado!</strong> El registro se ha insertado.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>";
        $msg .= "<strong>Error al procesar!</strong> Revise los problemas:";
        $msg .= "<ul>";
        foreach ($carrera->getValidationFailures() as $error) {
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

<form action="Aplicacion.php?pagina=ListCarIn" method="POST">
    <div class="container">
    <div class="row">
        <div class="mb-3">
            <label for="carrera" class="form-label">Carreras</label>
            <select name='txtCarreras' class="form-select" id="carrera">
                <option value="bio">Biología</option>
                <option value="adm">Administración</option>
                <option value="inf">Informática</option>
                <option value="ige">Ingeniería Gestión</option>
                <option value="agr">Agronomía</option>
            </select>
        </div>  
        <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input name='txtId' type="text" class="form-control" id="id" placeholder="Ingresa el ID">
        </div>
        <div class="mb-3">
            <label for="id Carreras" class="form-label">ID Carreras</label>
            <input name='txtId' type="text" class="form-control" id="id" placeholder="id de la carrera">
        </div>
        <div class="mb-3">
            <input type="submit" value='Insertar' class="btn btn-success">
        </div>
    </div>
</div>
</form>

