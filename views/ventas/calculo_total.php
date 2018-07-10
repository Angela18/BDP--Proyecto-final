<?php

$total =$_POST['cantidad']*$_POST['precio'];

?>

<div class="controls">
		<input type="text" name="total"  value ="<?php echo $total; ?>" id="total" readonly="false">
</div>