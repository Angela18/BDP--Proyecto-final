 	<div id="content-header">
  </div>
   <div class="container-fluid">
    <hr>
    <?php
        if (isset($_GET['action'])) {
               if ($_GET['action'] == 'producto_ok') {
                    if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                      }
                }
         } 
    ?>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de Productos</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>N.</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>Marca</th>
                  <th>Talla</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php $cont=0; $lista_productos = ProductosController::index();
                foreach ($lista_productos as $key => $value) {  $cont++; ?>
                    <tr>
                      <td><?php echo $cont;  ?></td>
                      <td><?php echo $value['nombre']; ?></td>
                      <td>S/. <?php echo $value['precio']; ?></td>
                      <td><?php echo $value['stock']; ?></td>
                      <td><?php echo $value['marca']; ?></td>
                       <td><?php echo $value['talla']; ?></td>
                        <td style="align:center; ">
                            <a href="ver_producto?data=<?php echo $value['id']; ?>" class="btn btn-info">Ver</a>
                            <a href="editar_producto?data=<?php echo $value['id']; ?>" class="btn btn-warning">Editar</a>
                              <form method="post"  style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                            <?php 
                                  $delete = new ProductosController();
                                  $delete->delete();
                              ?>
                            <input type="submit" name="eliminar_producto" value="Eliminar" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar?')">

                          </form>
                        </td>
                    </tr>
                <?php  } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  jQuery(document).ready(function($) {
        $( "#sidebar ul li.roles" ).addClass( "active" );
  });
  </script>