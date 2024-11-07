<?php
$registro="";
$registro = @$_GET["registro"];

$carreras="";
$semestres="";
$id="";
$msg="";    

if(@$_GET["tarea"]=="guardar")
{
    $car = CarrerasQuery::create()->findPk($registro);
    $car->setCarreras($_POST["txtCarreras"]);
    $car->setSemestres($_POST["txtSemestres"]);
    $car->setId($_POST["txtId"]);
    if($car->validate())
        {
        $car->save();
            $msg="<div class='alert alert-success'><strong>Registro correcto!</strong> se han guardado la información.</div>";
        }
    else{
        $msg="<div class='alert alert-danger'>";
        $msg.="<strong>¡Error al procesar!</strong> revise los problemas:";
        $msg.="<ul>";
        foreach($est->getValidationFailures() as $error){
            $msg.="<li>".$error->getMessage()."</li>";
        }
        $msg.="</ul>";
        $msg.="</div>";
    }
}


$car2 = CarrerasQuery::create()->findPk($registro);
$carreras = $car2->getCarreras();
$semestres = $car2->getSemestres();
$id = $car2->getId();
echo $msg;
?>

<form action="Aplicacion.php?pagina=ListCarMod&registro=<?php echo $registro; ?>&tarea=guardar" method="POST">
<div class="container">
    <div class="row">
        <div class="mb-3">
            <label for="correo" class="form-label">Carreras</label>
            <input name='txtCarreras' value="<?php echo $carreras; ?>" type="txt" class="form-control" id="correo" placeholder="aqui debe de ir una carrera">
        </div>
        <div class="mb-3">
            <label for="contr" class="form-label">Semestres</label>
            <input name='txtSemestres' value="<?php echo $semestres; ?>" type="text" class="form-control" id="contr" placeholder="semestre">
        </div>
        <div class="mb-3">
            <label for="contr" class="form-label">ID Carreras</label>
            <input name='txtId' value="<?php echo $id; ?>" type="text" class="form-control" id="id" placeholder="Id carrera">
        </div>
        <div class="mb-3">
            <input type="submit" value='Actualizar' class="btn btn-warning">
        </div>
    </div>
    
</div>
</form>
