 <?php

session_start();

if(!$_SESSION["usuario"]){

	header("location:login");

	exit();

}

?>
<!-- Breadcrumbs -->
  <div id="content-header">
       <div id="breadcrumb"> <a href="index>
.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Administración</a></div>
  </div<!--End-breadcrumbs-->
<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
     <h1> Bienvenidos al panel administrativo</h1>
      <ul class="quick-actions">
        <!--<li class="bg_lb"> <a href="listar_usuarios"> <i class="icon-th-list"></i> Usuarios </li>
        <li class="bg_lg"> <a href=""> <i class="icon-th-list"></i> Roles</a> </li>
        <li class="bg_ly"> <a href="#"> <i class="icon-th-list"></i>Ventas </a> </li>
        <li class="bg_lo"> <a href="#"> <i class="icon-th-list"></i> Clientes</a> </li>
        <li class="bg_ls"> <a href="#"> <i class="icon-th-list"></i> Productos</a> </li>-->



      </ul>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    

    <hr/>

  </div>



  <script>
  jQuery(document).ready(function($) {
        $( "#sidebar ul li.dashboard" ).addClass( "active" );
  });
  </script>