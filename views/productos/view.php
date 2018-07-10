<?php
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$parts = parse_url($actual_link);
		//vine hacer la parte que pasamos por parametro pe
		//http://php.net/manual/es/function.parse-url.php
		//https://techjourney.net/retrieve-get-query-string-from-url-in-php/
		parse_str($parts['query'], $query);
		$id=$query['data'];
		$producto = ProductosController::view($id);
 ?>
  <div id="content-header">
   <!-- <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Usuarios</a> <a href="#" class="current">Listado</a> </div>
    --><h1>Información</h1>
  </div>
    <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
       		<div class="widget-box">
			        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
			          <h5>Información</h5>
			        </div>
			        <div class="widget-content nopadding">
			          <form  class="form-horizontal">
			            <div class="control-group">
			              <label class="control-label">Nombre:</label>
			              <div class="controls">
			               <?php echo $producto['nombre']; ?>
			              </div>
			            </div>	
			            <div class="control-group">
			              <label class="control-label">Precio:</label>
			              <div class="controls">
			               S/.<?php echo $producto['precio']; ?>
			              </div>
			            </div>	
			            <div class="control-group">
			              <label class="control-label">Stock:</label>
			              <div class="controls">
			               <?php echo $producto['stock']; ?>
			              </div>
			            </div>	
			            <div class="control-group">
			              <label class="control-label">Marca:</label>
			              <div class="controls">
			               <?php echo $producto['marca']; ?>
			              </div>
			            </div>	
			             <div class="control-group">
			              <label class="control-label">Talla:</label>
			              <div class="controls">
			               <?php echo $producto['talla']; ?>
			              </div>
			            </div>					 		            
			          </form>
			          <?php if($producto['imagen']!=null || $producto['imagen']!=""){ ?>
			          <form  class="form-horizontal">
			            <div class="control-group">
			              <label class="control-label">Imagen:</label>
			              <div class="controls">
			              	<?php  $ficheros  = scandir($producto['imagen']);  
			              			
			              			array_shift($ficheros);   array_shift($ficheros);
			              		//	print_r($ficheros); die; 
			              			if(!empty($ficheros)){
					              		//	array_shift($ficheros);   array_shift($ficheros);
					              			foreach ($ficheros as $key => $value) { ?>
					              			<?php  echo '<img src="assets/productos/'.$id.'/'.$value.'" width="20%" alt="">' ?>
			              			 <?php } } ?>
			              </div>
			            </div>					 		            
			          </form>
			          <?php } ?>

			        </div>

      </div>
       <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
               <a href="listar_productos" class="btn btn-info">Regresar</a>	
              </div>
		</div>
      </div>
    </div>
</div>
  <script>
  jQuery(document).ready(function($) {
        $( "#sidebar ul li.productos" ).addClass( "active" );
  });
  </script>