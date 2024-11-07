
<?php
$registro = @$_GET["registro"];
$msg = "";


///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
if(@$_GET["tarea"]=="delete")
{
    $est = EstudiantesQuery::create()->findPk($registro);
    if ($est) {
        $est->delete();
        $msg = "<div class='alert alert-success'><strong>Registro eliminado!</strong> El registro se ha eliminado.</div>";
    } else {
        $msg = "<div class='alert alert-danger'><strong>Error al eliminar!</strong> No se encontró el registro.</div>";
    }
}
 
   $est2 = EstudiantesQuery::create()->findPk($registro);
if ($est2) {
    $matricula = $est2->getMatricula();
    $nombres = $est2->getNombres();
    $apellidos = $est2->getApellidos();
} 
?>

<?php if (!empty($msg)) {
    echo $msg;
} ?> 
  
///////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

<form action="Aplicacion.php?pagina=estudiantesAdelete&registro=<?php echo $registro; ?>&tarea=eliminar" method="POST">
    <div class="container">
    <div class="row">
        <?php if ($est2) { ?>
            <div class="mb-3">
                <label for="correo" class="form-label">Matricula</label>
                <input name='txtMatricula' value="<?php echo $matricula; ?>" type="text" class="form-control" id="correo" placeholder="correo" readonly>
            </div>
            <div class="mb-3">
                <label for="contr" class="form-label">Nombres</label>
                <input name='txtNombres' value="<?php echo $nombres; ?>" type="text" class="form-control" id="contr" placeholder="ingresa la contraseña" readonly>
            </div>
            <div class="mb-3">
                <label for="contr" class="form-label">Apellidos</label>
                <input name='txtApellidos' value="<?php echo $apellidos; ?>" type="text" class="form-control" id="contr" placeholder="Ingresa tu nombre" readonly>
            </div>
            <div class="mb-3">
                <input type="submit" value='Eliminar' class="btn btn-danger">
            </div>
        <?php } ?>
    </div>
</div>
</form>