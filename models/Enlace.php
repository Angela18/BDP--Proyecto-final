<?php

class Enlace
{

    public static function enlacesPaginasModel($get)
    {
        //
        // Páginas de los módulos
        //

        if ($get == "dashboard" ) {
          //  print_r($get); die;     
            $module = "views/usuarios/" . $get . ".php";

        }

        // Página del login
        //
        else if ($get == "index") {

            $module = "views/usuarios/login.php";

         } else if ($get == "logout") {

            $module = "views/usuarios/logout.php";

        }
        // -----------------------------------------------
        // modulo de usuarios

         else if ($get == "agregar_usuario") {       

            $module = "views/usuarios/add.php";

        } else if ($get == "editar_usuario") {

            $module = "views/usuarios/edit.php";

        } else if ($get == "ver_usuario") {

            $module = "views/usuarios/view.php";

        } else if ($get == "listar_usuarios"  or $get == "usuario_ok") {
            $module = "views/usuarios/index.php";

        }

        //modulo de roles
    

             else if ($get == "agregar_rol") {

                $module = "views/roles/add.php";

            }  else if ($get == "editar_rol") {

                $module = "views/roles/edit.php";

            } else if ($get == "ver_rol") {

                $module = "views/roles/view.php";

            } else if ($get == "listar_roles" or $get == "rol_ok") {

                $module = "views/roles/index.php";

            }


               //modulo de ventas
    
             else if ($get == "agregar_venta") {

                $module = "views/ventas/add.php";

            }  else if ($get == "editar_venta") {

                $module = "views/ventas/edit.php";

            } else if ($get == "ver_venta") {

                $module = "views/ventas/view.php";

            } else if ($get == "listar_ventas" or $get == "venta_ok") {

                $module = "views/ventas/index.php";

            }

                //modulo de productos
    
             else if ($get == "agregar_producto") {

                $module = "views/productos/add.php";

            }  else if ($get == "editar_producto") {

                $module = "views/productos/edit.php";

            } else if ($get == "ver_producto") {

                $module = "views/productos/view.php";

            } else if ($get == "listar_productos" or $get == "producto_ok") {

                $module = "views/productos/index.php";

            }

             //modulo de clientes
    
             else if ($get == "agregar_cliente") {

                $module = "views/clientes/add.php";

            }  else if ($get == "editar_cliente") {

                $module = "views/clientes/edit.php";

            } else if ($get == "ver_cliente") {

                $module = "views/clientes/view.php";

            } else if ($get == "listar_clientes" or $get == "cliente_ok") {

                $module = "views/clientes/index.php";

            }





        // -----------------------------------------------
        // Fin de los usuariosistradores

        //
        // Páginas por default
        //
        else {

            $module = "views/usuarios/logout.php";

        }

        return $module;

    }

}
