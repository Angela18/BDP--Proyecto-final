 <?php
if(!$_SESSION["usuario"]){
    //sino existe usuarios en sesion regresamos a login
     header("location:login");
     exit();
}else{
  if($_SESSION['rol']==2){
    //si es de tipo 2(operador) lo mandamos al dashboard
    header("location:dashboard");
    exit();

  }
}

?>

 	<div id="content-header">
  </div>
   <div class="container-fluid">
    <hr>
    <?php
        if (isset($_GET['action'])) {
               if ($_GET['action'] == 'venta_ok') {
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
            <h5>Listado de Ventas</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Numero</th>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                  <th>Cliente</th>
                  <th>Usuario</th>
                </tr>
              </thead>
              <tbody>
                <?php $cont=0; $suma_total=0; $lista_ventas = VentasController::index();
                foreach ($lista_ventas as $key => $value) {  $cont++; $suma_total+=$value['total']; ?>
                    <tr>
                      <td><?php echo $value['id']  ?></td>
                      <td><?php echo $value['producto']; ?></td>
                      <td>S/. <?php echo $value['precio']; ?></td>
                      <td><?php echo $value['cantidad']; ?></td>
                      <td>S/. <?php echo $value['total']; ?></td>
                      <td><?php echo $value['cliente']; ?></td>
                      <td><?php echo $value['usuario']; ?></td>
                        <!--<td style="align:center; ">
                            <a href="ver_rol?data=<?php echo $value['id']; ?>" class="btn btn-info">Ver</a>
                            <a href="editar_rol?data=<?php echo $value['id']; ?>" class="btn btn-warning">Editar</a>
                              <form method="post"  style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                            <?php 
                                  $delete = new RolesController();
                                  $delete->delete();
                              ?>
                            <input type="submit" name="eliminar_rol" value="Eliminar" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar?')">

                          </form>
                        </td>-->
                    </tr>
                <?php  } ?>

              </tbody>
            </table>
            <span ><b style="font-size:25px;">Total ganacia: S/.  <?php echo $suma_total;  ?></b></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  jQuery(document).ready(function($) {
        $( "#sidebar ul li.ventas" ).addClass( "active" );
  });
  </script>