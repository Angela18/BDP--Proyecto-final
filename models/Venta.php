<?php

    require_once  "models/conexion.php";
   // session_start();
    error_reporting(E_ALL ^ E_NOTICE);

class Venta{

	 public  static function index(){
         $sql = Conexion::conectar()->prepare("SELECT  ve.id , ve.total , ve.precio, ve.cantidad ,cl.nombres as cliente, us.usuario as usuario,
                                              pr.nombre as producto
                                              FROM ventas AS ve
                                              INNER JOIN clientes cl ON ve.cliente_id=cl.id
                                              INNER JOIN usuarios us ON ve.usuario_id=us.id
                                              INNER JOIN productos pr ON ve.producto_id=pr.id;");
      //  $sql = Conexion::conectar()->prepare("SELECT * FROM ventas;");

        if ($sql->execute()) {
             return $sql->fetchAll();
        } else {
            echo "Error";
        }

        $sql->close();
    }

    public function add($datosModel){
      //  print_r($datosModel); die; 
        $sql = Conexion::conectar()->prepare("INSERT INTO ventas(precio,fecha_venta,cliente_id,usuario_id,cantidad,producto_id,total) 
        									VALUES(:precio,:fecha_venta,:cliente_id,:usuario_id,:cantidad,:producto_id,:total)");

        $sql->bindParam(":fecha_venta", $datosModel['fecha_venta']);
        $sql->bindParam(":total", $datosModel['total']);
        $sql->bindParam(":cliente_id", $datosModel['cliente_id']);
        $sql->bindParam(":usuario_id", $datosModel['usuario_id']);
        $sql->bindParam(":cantidad", $datosModel['cantidad']);
        $sql->bindParam(":precio", $datosModel['precio']);
        $sql->bindParam(":producto_id", $datosModel['producto_id']);

        $sql2 = Conexion::conectar()->prepare("UPDATE productos SET stock=stock-:cantidad 
                          WHERE id=:id");
        $sql2->bindParam(':id', $datosModel['producto_id']);
        $sql2->bindParam(':cantidad', $datosModel['cantidad']);

        $sql2->execute();
        
        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }


   /* public function edit($datosModel){
        $sql = Conexion::conectar()->prepare("UPDATE ventas SET descripcion=:descripcion 
        									WHERE id=:id");
        $sql->bindParam(':id', $datosModel['id']);
        $sql->bindParam(':descripcion', $datosModel['descripcion']);

         if ($sql->execute()) {
            return 'success';
        } else {
            return "Error";
        }

        $sql->close();
    }


    public function delete($id){
        $sql = Conexion::conectar()->prepare("DELETE FROM ventas WHERE id = :id");
        $sql->bindParam(":id", $id);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';
        }
        $sql->close();
    }


    public static function view($id){
        $sql = Conexion::conectar()->prepare("SELECT * FROM ventas WHERE id=:id LIMIT 1;");
        $sql->bindParam(":id", $id);
      
        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }
    
  */



}
