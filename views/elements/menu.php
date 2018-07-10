<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> ADMINISTRACION</a>
  <ul>
    <li class="dashboard"><a href="dashboard"><i class="icon icon-home"></i> <span>Administracion</span></a> </li>
    <?php if($_SESSION['rol']==1) { ?>
    <li class="submenu usuarios"> <a href="#"><i class="icon icon-th-list"></i> <span>Usuarios</span></a>
      <ul>
        <li><a href="agregar_usuario">Agregar</a></li>
        <li><a href="listar_usuarios">Ver Todos</a></li>
      </ul>
    </li>
    <li class="submenu roles"> <a href="#"><i class="icon icon-th-list"></i> <span>Roles</span></a>
      <ul>
        <li><a href="agregar_rol">Agregar</a></li>
        <li><a href="listar_roles">Ver Todos</a></li>
      </ul>
    </li>
    <li class="submenu clientes"> <a href="#"><i class="icon icon-th-list"></i> <span>Clientes</span></a>
      <ul>
        <li><a href="listar_clientes">Ver Todos</a></li>
      </ul>
    </li>
    
    
    <?php } ?>
     <li class="submenu ventas"> <a href="#"><i class="icon icon-th-list"></i> <span>Ventas</span></a>
      <ul>
        <li><a href="agregar_venta">Agregar</a></li>
        <li><a href="listar_ventas">Ver Todos</a></li>
      </ul>
    </li>
     <li class="submenu productos"> <a href="#"><i class="icon icon-th-list"></i> <span>Productos</span></a>
      <ul>
        <li><a href="agregar_producto">Agregar</a></li>
        <li><a href="listar_productos">Ver Todos</a></li>
      </ul>
    </li>
    
    
   

  </ul>
</div>
<!--sidebar-menu-->
