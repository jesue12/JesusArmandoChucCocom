<?php
session_start();
include_once 'propel_init_loader.php';
if($_SESSION["usuario"]=="")
{
    header('Location: index.php?valor=error3');
}
?>
<html>
    <head>
        <title>Hola</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                  <?php include_once 'aplicacion_banner.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <?php include_once 'aplicacion_menu.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <?php include_once 'aplicacion_contenido.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <?php include_once 'aplicacion_pie.php'; ?>
                </div>
            </div>
        </div>
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>



