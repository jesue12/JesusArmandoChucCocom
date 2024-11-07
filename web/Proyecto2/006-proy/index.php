<?php
session_start();
$error="";
@$error=$_GET["valor"];
$mensaje="";
switch ($error)
{
    case "error1": $mensaje = '<div class="alert alert-danger" role="alert">Error en las credenciales de acceso</div>';break;
    case "error2": $mensaje = '<div class="alert alert-danger" role="alert">Error en el usuario</div>';break;
    case "error3": $mensaje = '<div class="alert alert-warning" role="alert">Para visualizar la aplicación debe de iniciar sesión</div>';break;
    case "cerrar": session_destroy(); $mensaje = '<div class="alert alert-success" role="alert">La sesión se cerró correctamente</div>';break;
    default : /*no hago algo*/break;
}


?>
<html>
    <head>
        <title>Inicio de sesión</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- comment -->
        <div class="container text-center">
  <div class="row">
    <div class="col">
      &nbsp;
    </div>
    <div class="col-3">

        <main class="form-signin w-100 m-auto">
            <form action="validacion.php" method="POST">
              <img class="mb-4" src="logo.png" alt="">
              <h1 class="h3 mb-3 fw-normal">Ingresa tus datos</h1>

              <div class="form-floating">
                <input type="email" name="txtUsuario" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Correo electrónico</label>
              </div>
              <div class="form-floating">
                <input type="password" name="txtContrasena" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
              </div>

              <input class="btn btn-danger w-100 py-2" type="submit" value="Ingresar">
              <?php echo $mensaje; ?>
            </form>
          </main>
    </div>
      <div class="col">
      &nbsp;
    </div>
  </div>
        <!-- comment -->
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
