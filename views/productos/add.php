 <div id="content-header">
  </div>

 <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Agregar Producto</h5>
          </div>
          <div class="widget-content nopadding">
          	    <form class="form-horizontal" method="post" action="agregar_producto" name="add_producto" id="add_producto" novalidate="novalidate" enctype="multipart/form-data">
                 	<div class="control-group">
		                <label class="control-label">Nombre</label>
		                <div class="controls">
		                  <input type="text" name="nombre" id="nombre">
		                </div>
	               </div>
	               <div class="control-group">
		                <label class="control-label">Precio</label>
		                <div class="controls">
		                  <input type="text" name="precio" id="precio">
		                </div>
	               </div>
	               <div class="control-group">
		                <label class="control-label">Stock</label>
		                <div class="controls">
		                  <input type="text" name="stock" id="stock">
		                </div>
	               </div>
	               <div class="control-group">
		                <label class="control-label">Marca</label>
		                <div class="controls">
		                  <input type="text" name="marca" id="marca">
		                </div>
	               </div>
	               <div class="control-group">
		                <label class="control-label">Talla</label>
		                <div class="controls">
		                  <input type="text" name="talla" id="talla">
		                </div>
	               </div>
	               <div class="control-group">
		                <label class="control-label">Imagenes</label>
		                <div class="controls">
		                 	 <input type="file" name="imagen[]" class="imagen" multiple="multiple">
		                </div>
	               </div>

	              <div class="form-actions">
		              	<?php 
	                     		$add = new ProductosController();
	                     		$add->add();
	                    ?>
		                <input type="submit" name="agregar_producto" value="Guardar" class="btn btn-success">
	              </div>
	            </form>

          </div>
        </div>
      </div>
    </div>
</div>


<script>
	
jQuery(document).ready(function($) {

	
	// Form Validation
    $("#add_producto").validate({
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


     $( "#sidebar ul li.productos" ).addClass( "active" );

	


});

</script>
