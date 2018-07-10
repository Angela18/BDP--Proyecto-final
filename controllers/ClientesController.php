<?php

class ClientesController{
         public static function index(){
         $respuesta = Cliente::index();
         return $respuesta;

     }

     public static function add(){
        if (isset($_POST['agregar_rol'])) {

               $datosController = array(
                  'descripcion' => $_POST['descripcion'],
            );
            $respuesta = Rol::add($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:rol_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

    public static function edit(){
        if (isset($_POST['editar_rol'])) {
               $datosController = array(
                  'id' => $_POST['id'],
                  'descripcion' => $_POST['descripcion']
            );
            $respuesta = Rol::edit($datosController);
            if ($respuesta == 'success') {              
                $_SESSION["message"]='<div class="alert alert-success alert-block">
                    Se guardo correctamente </div>';
                header('location:rol_ok');
             
            } else {
                echo "<h2>Error</h2>";
            }
        }
     }

     
    public function delete(){
      if (isset($_POST['eliminar_rol'])) {               
              $id = $_POST['id'];            
              $respuesta = Rol::delete($id);
              if ($respuesta == 'success') {              
                  $_SESSION["message"]='<div class="alert alert-success alert-block">
                      Se elimino correctamente </div>';
                  header('location:rol_ok');
               
              } else {
                  echo "<h2>Error</h2>";
              }
       }
    }
     public static function view($id){

         $respuesta = Rol::view($id);
         return $respuesta;

     }

    public static function obtener_cliente($id){
           $respuesta = Cliente::obtener_cliente($id);
           return $respuesta;

     }
 /*
     public  static function listar_roles(){
           $respuesta = Rol::listar_roles();
           return $respuesta;

     }*/


}
