 <div id="content-header">
    <!--<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Usuarios</a> <a href="#" class="current">Listado</a> </div>
    <h1>Usuarios</h1>-->
  </div>
  <style>
  td .activo { color: green;}
  td .inactivo { color: red;}
</style>
   <div class="container-fluid">
    <hr>
    <?php
        if (isset($_GET['action'])) {
               if ($_GET['action'] == 'usuario_ok') {
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
            <h5>Listado de Usuarios</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>N.</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Usuario</th>
                  <th>Correo</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php $cont=0;  $lista_usuarios = UsuariosController::index();
             /*      echo '<pre>';
         print_r($lista_usuarios); 
         echo '<pre>'; die; */
                foreach ($lista_usuarios as $key => $value) {  $cont++;  ?>
                    <tr>
                      <td><?php echo $cont;  ?></td>
                      <td><?php echo $value['nombres']; ?></td>
                      <td><?php echo $value['apellidos']; ?></td>
                      <td><?php echo $value['usuario']; ?></td>
                      <td><?php echo $value['correo']; ?></td>
                      <td><?php echo $value['descripcion']; ?></td>
                      <td><?php if($value['estado']==1){echo '<span class="activo">Activo</span>'; }else { echo '<span class="inactivo">Inactivo</span>'; } ?></td>
                        <td style="align:center; ">
                            <a href="ver_usuario?data=<?php echo $value['id']; ?>" class="btn btn-info">Ver</a>
                            <a href="editar_usuario?data=<?php echo $value['id']; ?>" class="btn btn-warning">Editar</a>
                              <form method="post"  style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                            <?php 
                                  $delete = new UsuariosController();
                                  $delete->delete();
                              ?>
                            <input type="submit" name="eliminar_usuario" value="Eliminar" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar?')">

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
        $( "#sidebar ul li.usuarios" ).addClass( "active" );
  });
  </script>