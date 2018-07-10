<?php

    require_once  "models/conexion.php";
   // session_start();
    error_reporting(E_ALL ^ E_NOTICE);

class Producto{

	 public  static function index(){
        $sql = Conexion::conectar()->prepare("SELECT * FROM productos;");

        if ($sql->execute()) {
             return $sql->fetchAll();
        } else {
            echo "Error";
        }

        $sql->close();
    }

    public function add($datosModel){
        $sql = Conexion::conectar()->prepare("INSERT INTO productos(nombre,precio,stock,marca,talla,imagen) 
        									VALUES(:nombre,:precio,:stock,:marca,:talla,:imagen)");
        $sql->bindParam(":nombre", $datosModel['nombre']);
        $sql->bindParam(":precio", $datosModel['precio']);
        $sql->bindParam(":stock", $datosModel['stock']);
        $sql->bindParam(":marca", $datosModel['marca']);
        $sql->bindParam(":talla", $datosModel['talla']);
         $sql->bindParam(":imagen", $datosModel['imagen']);
 

        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function edit($datosModel){
        $sql = Conexion::conectar()->prepare("UPDATE productos SET nombre=:nombre,precio=:precio,stock=:stock,marca=:marca,talla=:talla 
        									WHERE id=:id");
        $sql->bindParam(':id', $datosModel['id']);
        $sql->bindParam(':nombre', $datosModel['nombre']);
        $sql->bindParam(':precio', $datosModel['precio']);
        $sql->bindParam(':stock', $datosModel['stock']);
        $sql->bindParam(':marca', $datosModel['marca']);
         $sql->bindParam(':talla', $datosModel['talla']);

         if ($sql->execute()) {
            return 'success';
        } else {
            return "Error";
        }

        $sql->close();
    }


    public function delete($id){
        $sql = Conexion::conectar()->prepare("DELETE FROM productos WHERE id = :id");
        $sql->bindParam(":id", $id);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';
        }
        $sql->close();
    }


    public static function view($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM productos WHERE id=:id LIMIT 1;");
        $sql->bindParam(":id", $id);
      
        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }
    
    public static function obtener_producto($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM productos
                                              WHERE id=:id
                                              LIMIT 1;");
        $sql->bindParam(":id", $id);

        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }

    public static function ultimo_id(){
        $sql = Conexion::conectar()->prepare("SELECT MAX(id) AS id FROM productos;");    
        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }



}
