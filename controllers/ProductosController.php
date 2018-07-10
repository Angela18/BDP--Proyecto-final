<?php

class ProductosController{
         public static function index(){
         $respuesta = Producto::index();
         return $respuesta;

     }

     public static function add(){
    if (isset($_POST['agregar_producto'])) {   
       //

       // echo '<pre>';
       // print_r($_FILES["imagen"]); 
       //print_r($_POST); die;     


         //si el usuario envio archivos !!!!
         if($_FILES["imagen"]["tmp_name"]["0"]!=''){
             ///
            $errors = array();
            $extension = array("jpeg","jpg","png","gif","JPEG","JPG","PNG","GIF");
            $bytes = 1024;
            $KB = 1024;
            $totalBytes = $bytes * $KB;
            $UploadOk=true; 

            foreach($_FILES["imagen"]["tmp_name"] as $key=>$value){
                  $temp = $_FILES["imagen"]["tmp_name"][$key];
                  $name = $_FILES["imagen"]["name"][$key];
                  
                  if($_FILES["imagen"]["size"][$key] > $totalBytes){
                    $UploadOk = false;
                    array_push($errors, $name." su tamaño es mayor a 1 mb.");
                  }
                  
                  $ext = pathinfo($name, PATHINFO_EXTENSION);
                  if(in_array($ext, $extension) == false){
                    $UploadOk = false;
                    array_push($errors, $name." no es una imagen valida.");
                  }        
            }

             if(count($errors)>0){
                 echo "<b>Errores:</b>";
                 echo "<br/><ul>";
                foreach($errors as $error) {
                  echo "<li>".$error."</li>";
                }
                  echo "</ul><br/>";
              }
              

              if($UploadOk == true){
                    //si paso las validaciones de la imagen , guardamos 
                    //obtenemos el ultimo id y +1 ... para la ruta de la imagen
                    $ultimo_id = Producto::ultimo_id();
                    $actual_id = $ultimo_id['id']+1; 
                    //creamos el directorio para guardar luego las imagenes     
                  
                    $url = $_SERVER['REQUEST_URI']; //returns the current URL
                    $parts = explode('/',$url);                
                    $nombre_proyecto=$parts['1'];
                    $path =$_SERVER['DOCUMENT_ROOT'].'/'.$nombre_proyecto.'/assets/productos/'.$actual_id;
                   
                    if (!is_dir($path)) {
                        mkdir($path);
                    }

                    $datosController = array(

                          'nombre' => $_POST['nombre'],
                          'precio' => $_POST['precio'],
                          'stock' => $_POST['stock'],
                          'marca' => $_POST['marca'],
                          'talla' => $_POST['talla'],
                          //'imagen' => $_SERVER['DOCUMENT_ROOT'].'/assets/productos/'.$actual_id.'/'
                          'imagen' =>$path
                    );
                    $respuesta = Producto::add($datosController);
                    if ($respuesta == 'success') {              
                        $_SESSION["message"]='<div class="alert alert-success alert-block">
                            Se guardo correctamente </div>';
                        header('location:producto_ok');
                     
                    } else {
                        echo "<h2>Error</h2>";
                    }

                    //guardamos las imagenes

                     foreach ($_FILES["imagen"]["tmp_name"] as $key=>$value) {
                        $temp = $_FILES["imagen"]["tmp_name"][$key];
                        $name = $_FILES["imagen"]["name"][$key];
                        //move_uploaded_file($temp,$_SERVER['DOCUMENT_ROOT'].'/assets/productos/'.$actual_id.'/'.$name);
                        move_uploaded_file($temp,$path.'/'.$name);
                    }
                  //  echo " Se subieron los archivos pe !!!";
              }

          }else{
            // si no hay archivos  !!!
                $datosController = array(
                          'nombre' => $_POST['nombre'],
                          'precio' => $_POST['precio'],
                          'stock' => $_POST['stock'],
                          'marca' => $_POST['marca'],
                          'talla' => $_POST['talla'],
                          'imagen' => ''
                    );
                $respuesta = Producto::add($datosController);
                if ($respuesta == 'success') {              
                    $_SESSION["message"]='<div class="alert alert-success alert-block">
                        Se guardo correctamente </div>';
                    header('location:producto_ok');
                 
                } else {
                    echo "<h2>Error</h2>";
                }
          
          }
   
    }
 
}

    public static function edit(){
        if (isset($_POST['editar_producto'])) {
               $datosController = array(
                  'id' => $_POST['id'],
                  'nombre' => $_POST['nombre'],
                  'precio' => $_POST['precio'],
                  'stock' => $_POST['stock'],
                  'marca' => $_POST['marca'],
                  'talla' => $_POST['talla']
            );
            $respuesta = Producto::edit($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:producto_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

     
    public function delete(){
      if (isset($_POST['eliminar_producto'])) {               
              $id = $_POST['id'];            
              $respuesta = Producto::delete($id);
              if ($respuesta == 'success') {              
                  $_SESSION["message"]='<div class="alert alert-success alert-block">
                      Se elimino correctamente </div>';
                  header('location:producto_ok');
               
              } else {
                  echo "<h2>Error</h2>";
              }
       }
    }
     public static function view($id){

         $respuesta = Producto::view($id);
         return $respuesta;

     }

    public static function obtener_producto($id){
           $respuesta = Producto::obtener_producto($id);
           return $respuesta;

     }
 /*
     public  static function listar_roles(){
           $respuesta = Producto::listar_roles();
           return $respuesta;

     }*/


}
