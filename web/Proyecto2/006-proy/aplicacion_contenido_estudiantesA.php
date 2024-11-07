<?php
include_once 'propel_init_loader.php';
$estudiantes = EstudiantesQuery::create()->find();
//$estudiantes = EstudiantesQuery::create()->find();
?>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Matricula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Carrera</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach($estudiantes as $es)
    {
            echo '<tr>'
                . '<th scope="row">'.$es->getIdEstudiantes().'</th>'
                . '<td>'.$es->getMatricula().'</td>'
                . '<td>'.$es->getNombres().'</td>'
                . '<td>'.$es->getApellidos().'</td>'
                . '<td>'.$es->getCarrera().'</td>'
                . '<td><a href="Aplicacion.php?pagina=estudiantesAmod&registro='.$es->getIdEstudiantes().'" class="btn btn-info">Modificar</a></td>'
                . '<td><a href="Aplicacion.php?pagina=estudiantesAeli&registro='.$es->getIdEstudiantes().'#" class="btn btn-danger">Eliminar</a></td>'

                . '</tr>';
    }
     
    ?>
    </tbody>
    </table>   

 <br>
<center><td><a href="Aplicacion.php?pagina=estudiantesAins" class="btn btn-success">Agregar registro</a></td></center>
<br>