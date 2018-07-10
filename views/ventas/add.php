  <?php 	$clientes = ClientesController::index(); ?>
   <?php 	$productos = ProductosController::index(); ?>
<style type="text/css">
span#calcular:hover {
	cursor: pointer;
	
}
span#calcular {
	color:#ffffff;
	background:green;
	 padding:10px;
}
</style>


</style>
 <div id="content-header">
  </div>

 <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Agregar Venta</h5>
          </div>
          <div class="widget-content nopadding">
          	    <form class="form-horizontal" method="post" action="agregar_venta" name="add_venta" id="add_venta" novalidate="novalidate">
	               <div class="control-group">
		                <label class="control-label">Fecha</label>
		                <div class="controls">
		                  <input type="date" name="fecha_venta" id="fecha_venta">
		                </div>
	               </div>
	               <div class="control-group">
			              <label class="control-label">Producto</label>
			               <div class="controls">
				                <select  id="lista_producto" style="width:220px;" name="producto_id" class="productos" >
				                			<option  data="0" value="0">--Seleccione Producto--</option>
				                	<?php foreach ($productos as $key => $value): ?>
				                			  <option  data="<?php echo $value['precio']; ?>" value="<?php echo $value['id']; ?>"><?php echo $value['nombre'].'- Precio: S/. '.$value['precio']; ?></option>
				                			 
				                	<?php endforeach ?>
				               
				                </select>
				           </div>
	           	   </div>
	           	   <div class="control-group">
		                <label class="control-label">Precio</label>
		                <div class="controls">
		                  <input type="text" name="precio" id="precio" readonly="false">
		                </div>
	               </div>
	               <div class="control-group">
		                <label class="control-label">Cantidad</label>
		                <div class="controls">
		                  <input type="text" name="cantidad" id="cantidad">
		                  <span style="" id="calcular">Calcular</span>
		                </div>
	               </div>
	               <div class="control-group">
		                <label class="control-label">Total</label>
		                 <div id="calculo_total">
			               <!-- <div class="controls">
			                  		<input type="text" name="total" id="total" readonly="false">
			                </div>-->
		                </div>
	               </div>
	               <div class="control-group">
			              <label class="control-label">Cliente</label>
			               <div class="controls">
				                <select id="lista_cliente" style="width:220px;" name="cliente_id" class="clientes" >
				                	<?php foreach ($clientes as $key => $value): ?>
				                			  <option value="<?php echo $value['id']; ?>"><?php echo $value['nombres']; ?></option>
				                	<?php endforeach ?>
				               
				                </select>
				           </div>
	           	   </div>


	              <div class="form-actions">
		              	<?php 
	                     		$add = new VentasController();
	                     		$add->add();
	                    ?>
		                <input type="submit" name="agregar_venta" value="Guardar" class="btn btn-success">
	              </div>
	            </form>

          </div>
        </div>
      </div>
    </div>
</div>


<script>
	
jQuery(document).ready(function($) {


		

				$("#lista_producto").change(function () {

					$("#lista_producto option:selected").each(function () {
						precio = $(this).attr( "data" );
						$("#precio").val(precio);
						
	
					});

						
					
			}); 
				$( "#calcular" ).click(function() {
						precio_j = $("#precio").val();
						cantidad_j = $("#cantidad").val();

						$.post("views/ventas/calculo_total.php", { precio: precio_j,cantidad:cantidad_j }, function(data){
							$("#calculo_total").html(data);
						});  
				  		 //$("#total").val($("#precio").val() * $("#cantidad").val());
				});

			
	
	// Form Validation
    $("#add_venta").validate({
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


     $( "#sidebar ul li.ventas" ).addClass( "active" );

	


});

</script>
