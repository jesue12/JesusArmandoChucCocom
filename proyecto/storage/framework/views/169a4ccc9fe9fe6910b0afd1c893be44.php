<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=YELLOWTAIL&display=swap" rel="stylesheet">
<style>
  .titulo{ font-family: 'YELLOWTAIL';font-weight: 50px; }
  .contenido { font-family: "Poppins"; src: url("jesus/Poppins-Black.ttf") format("truetype"); }
</style>
</head>
<body>
  <header class="titulo">VIDA FITNESS</header>
  
       <?php echo e($slot); ?>     <!-- con esto se especifica lo que cambiará -->
 
  <footer class="contenido">POR TU SALUD ¡CUÌDATE!</footer> 
</body>
</html><?php /**PATH /home/jesus/laravel/proyecto/resources/views/components/app-layout.blade.php ENDPATH**/ ?>