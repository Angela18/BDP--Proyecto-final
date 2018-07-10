<?php

class VentasController{
         public static function index(){
         $respuesta = Venta::index();
         return $respuesta;

     }

     public static function add(){

        if (isset($_POST['agregar_venta'])) {

          $producto = producto::obtener_producto($_POST['producto_id']);
        //  print_r($producto['stock']); die; 

            if($producto['stock']>=$_POST['cantidad']){

                     $datosController = array(
                          'fecha_venta' => $_POST['fecha_venta'],
                          'producto_id' => $_POST['producto_id'],
                          'cantidad' => $_POST['cantidad'],
                          'precio' => $_POST['precio'],
                          'total' => $_POST['total'],
                          'cliente_id' => $_POST['cliente_id'],
                          'usuario_id' => $_SESSION['id'],
                          'total' => $_POST['total']
                    );
                    $respuesta = Venta::add($datosController);
                    if ($respuesta == 'success') {              
                        $_SESSION["message"]='<div class="alert alert-success alert-block">
                            Se guardo correctamente </div>';
                        header('location:venta_ok');
                     
                    } else {
                        echo "<h2>Error</h2>";
                    }
            }else {
                        echo "<h2>El stock es menor a la cantidad</h2>";
           }

        }
     }

    public static function edit(){
        if (isset($_POST['editar_venta'])) {
               $datosController = array(
                  'id' => $_POST['id'],
                  'descripcion' => $_POST['descripcion']
            );
            $respuesta = Venta::edit($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:venta_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

     
    public function delete(){
      if (isset($_POST['eliminar_venta'])) {               
              $id = $_POST['id'];            
              $respuesta = Venta::delete($id);
              if ($respuesta == 'success') {              
                  $_SESSION["message"]='<div class="alert alert-success alert-block">
                      Se elimino correctamente </div>';
                  header('location:venta_ok');
               
              } else {
                  echo "<h2>Error</h2>";
              }
       }
    }
     public static function view($id){

         $respuesta = Venta::view($id);
         return $respuesta;

     }

    public static function obtener_venta($id){
           $respuesta = Venta::obtener_venta($id);
           return $respuesta;

     }
 /*
     public  static function listar_ventas(){
           $respuesta = Venta::listar_ventas();
           return $respuesta;

     }*/


}
