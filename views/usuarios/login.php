
<div id="loginbox">            
    <form id="loginform" class="form-vertical" action="index.php" method="post">
         <div class="control-group normal_text"> <h3><img src="assets/img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input name="usuario"  type="text" placeholder="Usuario" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="clave"  type="password" placeholder="Clave" />
                </div>
            </div>
        </div>
        <div class="form-actions">
          <!--  <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>-->
                <?php 
                     $ingreso = new UsuariosController();
                     $ingreso->login();
                 ?>
            <span class="pull-right"> 
                 <input  type="submit" name="submit" class="btn btn-succes" value=" Login"></span>
        </div>
    </form>
    <!--<form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
        
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                </div>
            </div>
       
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
        </div>
    </form>-->
</div>