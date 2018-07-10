 <?php
if(!$_SESSION["usuario"]){
		//sino existe usuarios en sesion regresamos a login
	   header("location:login");
	   exit();
}else{
	if($_SESSION['rol']!=1){
		//si es de tipo 2(operador) lo mandamos al dashboard
		header("location:dashboard");
		exit();

	}
}

?>

<?php
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$parts = parse_url($actual_link);

		parse_str($parts['query'], $query);
		$id=$query['data'];
		//obtengo  el rol
		if(isset($id)){
				$producto = ProductosController::obtener_producto($id);
			}

 ?>
  <div id="content-header">

  </div>

    <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
      	<div class="widget-box">
	          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
	            <h5>Editar Producto</h5>
	          </div>
	          <div class="widget-content nopadding">
	          	    <form class="form-horizontal" method="post" action="editar_producto" id="edit_producto" novalidate="novalidate">

	          	      <input type="hidden" name="id" value="<?php echo $id; ?>">
	          	       <div class="control-group">
			                <label class="control-label">Nombre</label>
			                <div class="controls">
			                  <input type="text" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>">
			                </div>
	              	 </div>
		              <div class="control-group">
			                <label class="control-label">Precio</label>
			                <div class="controls">
			                  <input type="text" name="precio" id="precio" value="<?php echo $producto['precio']; ?>">
			                </div>
	              	 </div>
	               <div class="control-group">
		                <label class="control-label">Stock</label>
		                <div class="controls">
		                  <input type="text" name="stock" id="stock" value="<?php echo $producto['stock']; ?>">
		                </div>
	               </div>
	               <div class="control-group">
		                <label class="control-label">Marca</label>
		                <div class="controls">
		                  <input type="text" name="marca" id="marca" value="<?php echo $producto['marca']; ?>">
		                </div>
	               </div>
	               <div class="control-group">
		                <label class="control-label">Talla</label>
		                <div class="controls">
		                  <input type="text" name="talla" id="talla" value="<?php echo $producto['talla']; ?>">
		                </div>
	               </div>
		              
		              <div class="form-actions">
		              		<?php 
	                     		$edit = new ProductosController();
	                     		$edit->edit();
	                    ?>
		                <input type="submit" name="editar_producto" value="Guardar" class="btn btn-success">
		              </div>
		            </form>

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
	// Form Validation
    $("#edit_producto").validate({
		rules:{
			descripcion:{
				required:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});


     $( "#sidebar ul li.roles" ).addClass( "active" );

	


});

</script>

