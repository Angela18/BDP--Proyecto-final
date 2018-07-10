<?php

require_once "controllers/ProductosController.php";


// modelos

require_once "models/Producto.php";
$lista_productos = ProductosController::index();

//print_r($lista_productos); die;
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Listado de Productos</title>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/portafolio.css" rel="stylesheet">

  </head>

  <body>
    <h1>Listado de Productos</h1>
    <div class="listado">
               <?php $cont=0; $lista_productos = ProductosController::index();
                foreach ($lista_productos as $key => $value) {  $cont++; ?>

                   <div class="producto">
                    <!-- -->

                    <?php if($value['imagen']!=null || $value['imagen']!=""){ ?>

                      <?php  $ficheros  = scandir($value['imagen']);                            
                          array_shift($ficheros);   array_shift($ficheros);
                        
                          if(!empty($ficheros)){
                              echo '<img src="assets/productos/'.$value['id'].'/'.$ficheros['0'].'" width="200px" height="200px" alt=""><br>' ?>
                               <?php  }
                                      else { ?>
                                      <img style="width:200px; height:200px;" src="assets/img/no_disponible.jpg"><br>
                               <?php } ?>

                      <?php } else { ?>
                              <img style="width:200px; height:200px;" src="assets/img/no_disponible.jpg"><br>
                    <?php   } ?>


                       <!--   <img style="width:200px; height:200px;" src="https://www.seamosmasanimales.com/wp-content/uploads/2015/11/tumbles-el-perrito-que-nacio-sin-sus-patas-delanteras-pero-no-deja-que-nada-lo-detenga-02.jpg"><br>
                          --><label>Nombre: <?php echo $value['nombre']; ?></label><br>
                          <label>Precio: S/. <?php echo $value['precio']; ?></label><br>
                          <label>Marca: <?php echo $value['marca']; ?> </label><br>
                          <label>Talla: <?php echo $value['talla']; ?></label>

                    </div> 
                        
                <?php  } ?>

    </div>



  </body>

</html>
