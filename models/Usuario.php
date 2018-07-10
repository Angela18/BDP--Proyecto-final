<?php

    require_once  "models/conexion.php";
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);

class Usuario{

    public static function login($datosModel, $tabla){
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario;");
        $sql->bindParam(":usuario", $datosModel["usuario"]);
        
         if ($sql->execute()) {
            return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();

    }

     public static function index(){
        $sql = Conexion::conectar()->prepare("SELECT u.*,r.descripcion FROM usuarios AS u INNER JOIN roles AS r
                                              ON u.rol_id = r.id;");

        if ($sql->execute()) {
            return $sql->fetchAll();
        } else {
            echo "Error";
        }
        
        $sql->close();
    }


    public function add($datosModel){
        $sql = Conexion::conectar()->prepare("INSERT INTO usuarios(nombres,apellidos,correo,usuario,clave,rol_id)
                                            VALUES(:nombres,:apellidos,:correo,:usuario,:clave,:rol_id)");

        $sql->bindParam(":nombres", $datosModel['nombres']);
        $sql->bindParam(":apellidos", $datosModel['apellidos']);
        $sql->bindParam(":correo", $datosModel['correo']);
        $sql->bindParam(":usuario", $datosModel['usuario']);
        $sql->bindParam(":clave", $datosModel['clave']);
        $sql->bindParam(":rol_id", $datosModel['rol_id']);

        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }

        $sql->close();
    }


    public function edit($datosModel){
        //print_r($datosModel); die; 
        $sql = Conexion::conectar()->prepare("UPDATE usuarios SET estado=:estado,nombres=:nombres,apellidos=:apellidos,usuario=:usuario,correo=:correo,rol_id=:rol_id
                                              WHERE id=:id");
        $sql->bindParam(':id', $datosModel['id']);
        $sql->bindParam(':nombres', $datosModel['nombres']);
        $sql->bindParam(':apellidos', $datosModel['apellidos']);
        $sql->bindParam(':correo', $datosModel['correo']);
        $sql->bindParam(':usuario', $datosModel['usuario']);
        $sql->bindParam(':rol_id', $datosModel['rol_id']);
        $sql->bindParam(':estado', $datosModel['estado']);

         if ($sql->execute()) {
            return 'success';
        } else {
            return "Error";
        }

        $sql->close();
    }


    public function delete($id){
        $sql = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindParam(":id", $id);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';
        }
        $sql->close();
    }


    public static function view($id){
        $sql = Conexion::conectar()->prepare("SELECT u.*, r.descripcion FROM usuarios AS u INNER JOIN roles AS r
                                              ON u.rol_id = r.id
                                              WHERE u.id=:id
                                              LIMIT 1;");
        $sql->bindParam(":id", $id);
      
        if ($sql->execute()) {
             return $sql->fetch();
        } else {
            echo "Error";
        }

        $sql->close();
    }

    public static function obtener_usuario($id){
        $sql = Conexion::conectar()->prepare("SELECT nombres,estado,apellidos,correo,usuario,rol_id FROM usuarios
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

/*
    public  static function listar_roles(){
        $sql = Conexion::conectar()->prepare("SELECT * FROM roles;");

        if ($sql->execute()) {
             return $sql->fetchAll();
        } else {
            echo "Error";
        }

        $sql->close();
    }*/


     


/*
    public static function getAdminModel($tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_OBJ);

        $sql->close();

    }
    public static function imprimirModel($tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $sql->execute();

        return $sql->fetchAll();

        $sql->close();

    }
    public static function getAdminModelUsuario($tabla, $id)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idAdmin = $id");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_OBJ);

        $sql->close();

    }

    public static function fecha($tabla, $id)
    {

        $sql = Conexion::conectar()->prepare("SELECT INTERVAL 15 DAY +  fechaCreado AS cambiar , idAdmin FROM $tabla WHERE idAdmin = $id");
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
        $sql->close();

    }

    public static function cambiarPassworModel($datosModel, $tabla)
    {
        // modifica el password del usuario(tabla administrador)
        //
        //
        $sql = Conexion::conectar()->prepare("UPDATE $tabla SET password = :password, fechaCreado= :fechaCreado WHERE idAdmin = :idAdmin");

        $sql->bindParam(":password", $datosModel['password']);
        $sql->bindParam(":fechaCreado", $datosModel['fechaCreado']);
        $sql->bindParam(":idAdmin", $datosModel['idAdmin']);

        // selecciona de la tabla pass para comparar las password.
        //
        //
        $pa = $datosModel['password'];
        $id = $datosModel['idAdmin'];
        $pass = Conexion::conectar()->prepare("SELECT password FROM pass
            WHERE idAdmin = $id
          ORDER BY idpass DESC LIMIT 3");

        $pass->execute();
        $res = $pass->fetchAll(PDO::FETCH_ASSOC);
        $a = $res[0];
        $b = $res[1];
        $c = $res[2];
        foreach ($a as $key) {

            if ($pa == $key) {
                return 'repetida';
            }
        }
        foreach ($b as $row) {

            if ($pa == $row) {
                return 'repetida';
            }
        }
        foreach ($c as $val) {
            if ($pa == $val) {
                return 'repetida';
            }
        }

        //// si todo va bien realiza el insert al tabla pass
        $sql1 = Conexion::conectar()->prepare("INSERT INTO pass(password ,idAdmin)VALUES (:password,:idAdmin)");
        $sql1->bindParam(":password", $datosModel['password']);
        $sql1->bindParam(":idAdmin", $datosModel['idAdmin']);

        if ($sql->execute() and $sql1->execute()) {
            return 'success';
        }

        $sql->close();
    }

    public function agregarUsuariosModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreAdmin,password,rol,fechaCreado)
       VALUES(:nombreAdmin,:password,:rol,:fechaCreado)");

        $sql->bindParam(":nombreAdmin", $datosModel['nombreAdmin']);
        $sql->bindParam(":password", $datosModel['password']);
        $sql->bindParam(":rol", $datosModel['rol']);
        $sql->bindParam(":fechaCreado", $datosModel['fechaCreado']);

        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }
        $sql->close();
    }

    public function deleteUsuarioModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idAdmin = :idAdmin");

        $sql->bindParam(":idAdmin", $datosModel);

        if ($sql->execute()) {

            return 'success';

        } else {

            return 'Error';
        }
        $sql->close();
    }

    public static function editarUsuarioModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT idAdmin ,nombreAdmin, password,rol FROM $tabla WHERE idAdmin = :idAdmin");
        $sql->bindParam(":idAdmin", $datosModel);
        $sql->execute();

        return $sql->fetch();
        $sql->close();
    }

    public function actualizarUsuarioModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("UPDATE $tabla SET nombreAdmin=:nombreAdmin,password=:password,rol=:rol WHERE idAdmin=:idAdmin");
        $sql->bindParam(':nombreAdmin', $datosModel['nombreAdmin']);
        $sql->bindParam(':password', $datosModel['password']);
        $sql->bindParam(':rol', $datosModel['rol']);
        $sql->bindParam(':idAdmin', $datosModel['idAdmin']);

        if ($sql->execute()) {
            return 'success';
        } else {
            return "Error";
        }
        $sql->close();
    }

    public function validarUsuarioModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT nombreAdmin FROM $tabla WHERE nombreAdmin = :nombreAdmin");
        $sql->bindParam(':nombreAdmin', $datosModel);

        $sql->execute();

        return $sql->fetch();

        $sql->close();
    }
    */

}
