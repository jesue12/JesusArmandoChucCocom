
<?php
@session_start();
$error="";
@$error=$_GET["valor"];
$mensaje="";
switch ($error)
{
  case "error1": $mensaje= '<div class="alert alert-danger" role="alert"> Error en la contraseña </div>';break;
    case "error2": $mensaje= '<div class="alert alert-danger" role="alert"> Error en el usuario</div>';break;
    case "error3": $mensaje= '<div class="alert alert-warning" role="alert"> para visualizar debe iniciar sesión</div>';break;
    case "cerrar": session_destroy(); $mensaje= '<div class="alert alert-danger" role="alert"> la sesión se cerro correctamente</div>';break;
    default : /*no hago algo*/break;

}
?>

<!DOCTYPE html>
<head>
<title>Inicio de sesión</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">

    

     <form action="sesion2.php" method="POST">

     <title>Iniciar Sesión</title>

     <style>

     body {
        background-image: url('imagen.avif'); 
            background-size: cover; 
            background-position: center;   

      display: flex;
      justify-content: center;
      align-items: center;
      height: 90vh;
      margin: 0;
    }
  </style>
</head>
<body>



     <main class="form-signin w-100 m-auto">
  <form action="sesion2.php" method_"POST">

    <img class="mb-4" src="foto.avif" alt="" width="200" height="100">
    
    <h1 class="h3 mb-3 fw-normal">Por favor inicia sesión</h1>

    <div class="form-floating">
      <input type="txtusuario" name="usuario" class="form-control" id="floatingInput" placeholder="usuario">
      <label for="floatingInput">Usuario</label>
    </label><br><br>

    
    </div>
    <div class="form-floating">
      <input type="password" name="contrasena" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>

      </label><br><br>

    </div>
    <input class="btn btn-danger w-100 py-2" type="submit" value="ingresar">
    
    <?php
    echo $mensaje; ?>

  </form>
</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
      
  
</style>  
    </body>
</html>