<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparación en Calorías</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
      

        .image-thumbnail {
            cursor: pointer;
            
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Análisis de Calorías</h1>

        <h2>Saludable</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Alimentos bajos en calorías</th>
                    <th>Calorías</th>
                    <th>Alimentos básicos</th>
                    <th>Calorías</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="<?php echo e(asset('images/manzana.webp')); ?>" alt="Manzana" class="image-thumbnail" id="manzana" style="width: 90px;"></td>
                    <td>52 C</td> 
                    <td><img src="<?php echo e(asset('images/cho.webp')); ?>" alt="100 gr Chocolate" class="image-thumbnail" id="chocolate" style="width: 90px;"></td>
                    <td>546 calorías</td>
                </tr>
                <tr>
                    <td><img src="<?php echo e(asset('images/cero.png')); ?>" alt="1 rebanada de Pan" class="image-thumbnail" id="pan" style="width: 50px;"></td>
                    <td>66 calorías</td> 
                    <td><img src="<?php echo e(asset('images/bol.webp')); ?>" alt="1 Bolillo" class="image-thumbnail" id="bolillo" style="width: 100px;"></td>
                    <td>183 calorías</td>
                </tr>
                <tr>
                    <td><img src="<?php echo e(asset('images/sani.jpg')); ?>" alt="1 pza tostada" class="image-thumbnail" id="tostada" style="width: 100px;"></td>
                    <td>48 calorías</td> 
                    <td><img src="<?php echo e(asset('images/tor.webp')); ?>" alt="1 Tortilla" class="image-thumbnail" id="tortilla" style="width: 100px;"></td>
                    <td>60 calorías</td>
                </tr>
                <tr>
                    <td><img src="<?php echo e(asset('images/beli.webp')); ?>" alt="500 ml Bebida Be Light" class="image-thumbnail" id="bebida" style="width: 100px;"></td>
                    <td>0 calorías</td> 
                    <td><img src="<?php echo e(asset('images/coca.png')); ?>" alt="500 ml Coca Cola" class="image-thumbnail" id="coca" style="width: 100px;"></td>
                    <td>205 calorías</td>
                </tr>
                <tr>
                    <td><img src="<?php echo e(asset('images/pollo.jpg')); ?>" alt="100 gr Pollo" class="image-thumbnail" id="pollo" style="width: 100px;"></td>
                    <td>117 kcal</td> 
                    <td><img src="<?php echo e(asset('images/cerdo.jpg')); ?>" alt="100 gr Cerdo" class="image-thumbnail" id="cerdo" style="width: 100px;"></td>
                    <td>273 kcal</td>
                </tr>
            </tbody>

        </table>

        <!-- Esto hace referencia al texto debajo de la tabla -->
        <h1><?php echo e($texto1); ?></h1>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Nombre del Alimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="" style="width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var imageElements = document.querySelectorAll('.image-thumbnail');
            var modal = document.getElementById('imageModal');
            var modalTitle = document.getElementById('imageModalLabel');
            var modalImage = document.getElementById('modalImage');

            imageElements.forEach(function(image) {
                image.addEventListener('click', function() {
                    var altText = image.alt;
                    modalTitle.textContent = altText;
                    modalImage.src = image.src;
                    $(modal).modal('show');
                });
            });
        });
    </script>
</body>
</html>
<?php /**PATH /home/jesus/laravel/proyecto/resources/views/page.blade.php ENDPATH**/ ?>