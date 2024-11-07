<?php
$msg = "";

// Verificar si se ha enviado una solicitud POST para eliminar el registro
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    $registro = $_POST["registro"];
    $carrera = CarrerasQuery::create()->findPk($registro);
    
    if ($carrera !== null) {
        $carrera->delete();
        $msg = "<div class='alert alert-success'><strong>Registro eliminado!</strong> El registro se ha eliminado.</div>";
    } else {
        $msg = "<div class='alert alert-danger'><strong>Error!</strong> No se pudo encontrar el registro.</div>";
    }
}

$registro = @$_GET["registro"];
$carrera = CarrerasQuery::create()->findPk($registro);

$carreras = $carrera ? $carrera->getCarreras() : "";
$semestres = $carrera ? $carrera->getSemestres() : "";
$id = $carrera ? $carrera->getid() : "";
?>

<?php if (!empty($msg)) {
    echo $msg;
} ?>

<form action="Aplicacion.php?pagina=ListCareli&registro=<?php echo $registro; ?>" method="POST">
    <input type="hidden" name="registro" value="<?php echo $registro; ?>">
    <input type="hidden" name="delete" value="true">
    <div class="container">
        <div class="row">
            <div class="mb-3">
                <label for="carreras" class="form-label">Carreras</label>
                <input name='txtCarreras' value="<?php echo $carreras; ?>" type="txt" class="form-control" id="carreras" placeholder="Carrera" readonly>
            </div>
            <div class="mb-3">
                <label for="semestres" class="form-label">Semestres</label>
                <input name='txtSemestres' value="<?php echo $semestres; ?>" type="text" class="form-control" id="semestres" placeholder="Semestre" readonly>
            </div>
            <div class="mb-3">
                <label for="claveCarreras" class="form-label">ID Carreras</label>
                <input name='txtId' value="<?php echo $id; ?>" type="text" class="form-control" id="id" placeholder="ID de la carrera" readonly>
            </div>
            <div class="mb-3">
                <input type="submit" value='Eliminar' class="btn btn-danger">
            </div>
        </div>
    </div>
</form>
