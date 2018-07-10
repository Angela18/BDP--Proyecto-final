<?php

class UsuariosController{
    public  $key = 'loquifru';
    public function login(){        

        if(isset($_POST["submit"])){

            //verificamos si no hay cracteres raros... !!!
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"])){

                $datosController = array("usuario"=>$_POST["usuario"],"clave"=>$_POST["clave"]);

                $respuesta = Usuario::login($datosController, "usuarios");
                $usuarioActual = $_POST["usuario"];

                    //desncriptamos la clave !!
                    $data = base64_decode($respuesta["clave"]);
                    $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
                    $clave_decrypted = rtrim(
                        mcrypt_decrypt(
                            MCRYPT_RIJNDAEL_128,
                            hash('sha256', $key, true),
                            substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
                            MCRYPT_MODE_CBC,
                            $iv
                        ),
                        "\0"
                    );

                    if($respuesta["usuario"] == $_POST["usuario"] && $clave_decrypted == $_POST["clave"] && $respuesta["estado"]==1){
                      
                      //  $_SESSION["validar"] = true;
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["rol"] = $respuesta["rol_id"];
                       // $_SESSION["idAdmin"] = $respuesta["idAdmin"];
                        echo '<center><div class="alert alert-success"> Bienvenido <strong>'. ' '.  $_SESSION["usuario"].'</strong></div>';
                        echo '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                                <span class="sr-only">Loading...</span></center>';

                         echo "<META HTTP-EQUIV='Refresh' CONTENT='3;  URL=dashboard'>";

                       
                    }

                    else{

                        echo '<div class="alert alert-danger">Error al ingresar</div>';

                    }

            }

        }
    }



     public static function index(){
         $respuesta = Usuario::index();
         return $respuesta;

     }

     public static function add(){
        if (isset($_POST['agregar_usuario'])) {

              if(isset($_POST['clave'])){
                    //encriptamos la clave !!
                      $iv = mcrypt_create_iv( mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM);
                      $encrypted = base64_encode(
                          $iv.mcrypt_encrypt(
                              MCRYPT_RIJNDAEL_128,
                              hash('sha256', $key, true),
                              $_POST['clave'],
                              MCRYPT_MODE_CBC,
                              $iv
                          )
                      );
                      $_POST['clave']=$encrypted; 
              }

               $datosController = array(
                  'nombres' => $_POST['nombres'],
                  'apellidos' => $_POST['apellidos'],
                  'usuario' => $_POST['usuario'],
                  'correo' => $_POST['correo'],
                  'clave' => $_POST['clave'],
                  'rol_id' => $_POST['rol_id']
            );
            $respuesta = Usuario::add($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:usuario_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

    public static function edit(){
        if (isset($_POST['editar_usuario'])) {
               $datosController = array(
                  'id' => $_POST['id'],
                  'nombres' => $_POST['nombres'],
                  'apellidos' => $_POST['apellidos'],
                  'usuario' => $_POST['usuario'],
                  'correo' => $_POST['correo'],
                  'rol_id' => $_POST['rol_id'],
                  'estado' => $_POST['activo']
            );
            $respuesta = Usuario::edit($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:usuario_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

     
    public function delete(){


      if (isset($_POST['eliminar_usuario'])) {               
              $id = $_POST['id'];            
              $respuesta = Usuario::delete($id);
              if ($respuesta == 'success') {              
                  $_SESSION["message"]='<div class="alert alert-success alert-block">
                      Se elimino correctamente </div>';
                  header('location:usuario_ok');
               
              } else {
                  echo "<h2>Error</h2>";
              }
       }
    }
     public static function view($id){

         $respuesta = Usuario::view($id);
         return $respuesta;

     }

     public static function obtener_usuario($id){
           $respuesta = Usuario::obtener_usuario($id);
           return $respuesta;

     }
/*
     public  static function listar_roles(){
           $respuesta = Usuario::listar_roles();
           return $respuesta;

     }
*/



/*

        public function agregarUsuariosController()
    {
        if (isset($_POST['agregar'])) {

            $datosController = array('nombreAdmin' => $_POST['nombreAdmin'],
                'password' => $_POST['password'],
                'rol' => $_POST['rol'],
                'fechaCreado' => $_POST['fechaCreado'],
            );
            // var_dump($datosController);
            $respuesta = Usuario::agregarUsuariosModel($datosController, 'administrador');

            if ($respuesta == 'success') {
                header('location:agregado');
            } else {
                echo "Error";
            }
        }
    }



      public function actualizarUsuarioController()
    {

        if (isset($_POST['editarUsuario'])) {
            $datosController = array('nombreAdmin' => $_POST['nombreAdmin'],
                'password' => $_POST['password'],
                'rol' => $_POST['rol'],
                'idAdmin' => $_POST['idAdmin'],
            );
            $respuesta = Usuario::actualizarUsuarioModel($datosController, 'administrador');

            if ($respuesta == 'success') {

                header('location:editado');
            }
        }
    }

    public static function getAdminController()
    {

        $respuesta = Usuario::getUsuario('administrador');
        foreach ($respuesta as $key) {
            $fecha = date('d-m-Y', strtotime($key->fechaCreado));
            echo "<tr>
          <td align='center' class='tooltips' data-toggle='tooltip' data-placement='top' title='fecha de creado : $fecha'>$key->usuario</td>
          <td align='center'>$key->clave</td>
          <td align='center'>$key->rol</td>
          <td align='center'><a href='index.php?action=editar&idEditar=$key->idAdmin'><i class='fa fa-edit btn btn-outline-primary btn-sm'></i></a> &nbsp;<a href='index.php?action=delete&id=$key->idAdmin'><i class='fa fa-trash  btn btn-outline-danger btn-sm'></i></a></td>
        </tr>";
        }
    }



    public function getAdminControllerUsuario()
    {
        $id = $_SESSION['idAdmin'];
        $respuesta = Usuario::getUsuarioUsuario('administrador', $id);
        foreach ($respuesta as $key) {
            $fecha = date('d-m-Y', strtotime($key->fechaCreado));
            $usuario = $key->rol;
            $usuario = 'USUARIO';
            echo "<tr>
          <td align='center' class='tooltips' data-toggle='tooltip' data-placement='top' title='fecha de creado : $fecha'>$key->nombreAdmin</td>
          <td align='center'>$key->password</td>
          <td align='center'>$usuario</td>
        </tr>";
        }
    }

    public function fecha()
    {
        $id = $_SESSION['idAdmin'];
        $respuesta = Usuario::fecha('administrador', $id);

        $hoy = date('Y-m-d');
        if ($hoy >= $respuesta->cambiar) {
            require 'views/modals/cambiarPass.php';
        }
    }

    public function cambiarPassworController()
    {
        if (isset($_POST['aceptar'])) {

            $datosController = array('idAdmin' => $_POST['idAdmin'],
                'password' => $_POST['password'],
                'fechaCreado' => $_POST['fechaCreado'],
            );

            $respuesta = Usuario::cambiarPassworModel($datosController, 'administrador');

            if ($respuesta == 'repetida') {
                header('location:repetida');
            }
            if ($respuesta == 'success') {
                header('location:cambio');

            }
        }
    }

    public function agregarUsuariosController()
    {
        if (isset($_POST['agregar'])) {

            $datosController = array('nombreAdmin' => $_POST['nombreAdmin'],
                'password' => $_POST['password'],
                'rol' => $_POST['rol'],
                'fechaCreado' => $_POST['fechaCreado'],
            );
            // var_dump($datosController);
            $respuesta = Usuario::agregarUsuariosModel($datosController, 'administrador');

            if ($respuesta == 'success') {
                header('location:agregado');
            } else {
                echo "Error";
            }
        }
    }

    public function deleteUsuarioController()
    {
        if (isset($_GET['id'])) {
            $datosController = $_GET['id'];
            $respuesta = Usuario::deleteUsuarioModel($datosController, 'administrador');

            if ($respuesta == 'success') {

                header('location:delet');
            }
        }
    }

    public static function editarUsuarioController()
    {
        $datosController = $_GET['idEditar'];

        $respuesta = Usuario::editarUsuarioModel($datosController, 'administrador');
        echo '
             <div class="form-group">
            <label for="recipient-name" class="form-control-label">Nombre Usuario:</label>
            <input type="text" class="form-control" id="recipient-name" name="nombreAdmin" value="' . $respuesta['nombreAdmin'] . '">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Password Usuario:</label>
            <input type="password" class="form-control" id="contra" name="password" value="' . $respuesta['password'] . '">
            <span id="pass"></span>
          </div>
          <label for="recipient-name" class="form-control-label">Tipo Usuario:</label>
          <select class="form-control" name="rol">
            <option value="' . $respuesta['rol'] . '">' . $respuesta['rol'] . '</option>
            <option value="A">ADMISTRADOR</option>
            <option value="U">USUARIO</option>

            <input type="hidden"name=" idAdmin" value="' . $respuesta['idAdmin'] . '">
          </select>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="no" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="editarUsuario">Editar Usuario</button>
           ';
    }

    public function actualizarUsuarioController()
    {

        if (isset($_POST['editarUsuario'])) {
            $datosController = array('nombreAdmin' => $_POST['nombreAdmin'],
                'password' => $_POST['password'],
                'rol' => $_POST['rol'],
                'idAdmin' => $_POST['idAdmin'],
            );
            $respuesta = Usuario::actualizarUsuarioModel($datosController, 'administrador');

            if ($respuesta == 'success') {

                header('location:editado');
            }
        }
    }

    public function validarUsuarioController($validarUsuario)
    {
        $datosController = $validarUsuario;
        $respuesta = Usuario::validarUsuarioModel($datosController, 'administrador');

        if ($respuesta) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function imprimirController($datos)
    {
        $datosController = $datos;

        $respuesta = Usuario::imprimirModel($datosController);
        return $respuesta;
    }*/

}
