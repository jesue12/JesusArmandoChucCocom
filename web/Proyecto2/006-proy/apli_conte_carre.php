<?php
$carreras = CarrerasQuery::create()->find();
?>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Carrera</th>
        <th scope="col">Semestre</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach($carreras as $carr)
    {
            echo '<tr>'
                . '<th scope="row">'.$carr->getidCarreras().'</th>'
                . '<td>'.$carr->getCarreras().'</td>'
                . '<td>'.$carr->getSemestre().'</td>'
              
                . '<td><a href="Aplicacion.php?pagina=ListCarMod&registro='.$carr->getIdCarreras().'" class="btn btn-info">Modificar</a></td>'
                . '<td><a href="Aplicacion.php?pagina=ListCarDel&registro='.$carr->getIdCarreras().'" class="btn btn-danger">Eliminar</a></td>'

              . '</tr>';
    }
    ?>
    </tbody>
    </table>   

 <br>
<center><td><a href="Aplicacion.php?pagina=ListCarIns" class="btn btn-success">Insertar registro</a></td></center>
<br>
