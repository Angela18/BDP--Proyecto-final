<!--Header-part-->
<div id="header">
      <h2><a href="#">VENTAS</a></h2>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text"><?php echo strtoupper($_SESSION['usuario']); ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="ver_usuario?data=<?php echo $_SESSION['id']; ?>"><i class=""></i> My Perfil</a></li>
        <li class="divider"></li>
        <li><a href="logout"><i class="icon-key"></i> Salir</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Ajustes</span></a></li>
    <li class=""><a title="" href="logout"><i class="icon icon-share-alt"></i> <span class="text">Salir</span></a></li>
  </ul>
</div>
