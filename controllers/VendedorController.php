<?php
 
 namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController{
     public static function  crear(Router $router){
         $errores= Vendedor::getErrores();
         $vendedor= new Vendedor;

         if($_SERVER['REQUEST_METHOD']==='POST'){
            // debuguear($_POST);
            //crear una nueva instancia
            $vendedor= new Vendedor($_POST['vendedor']);
            //debuguear($vendedor);
            //Validar que no hay campos vacios 
            $errores= $vendedor->validar();
            //Si no hay errores
            if(empty($errores)){
                $vendedor->guardar();
            }
           
           }
         $router->render('vendedores/crear',[
             'errores'=> $errores,
             'vendedor'=>$vendedor
         ]);
     }

     public static function  actualizar(Router $router){
        $errores= Vendedor::getErrores();
        $id= validarORedireccionar('/admin');

        //obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);

        if($_SERVER['REQUEST_METHOD']==='POST'){
            //asignar los valores
            $args= $_POST['vendedor'];
            //sincronizar obejto en memoria 
            $vendedor->sincronizar($args);
            //validación
            $errores = $vendedor->validar();
            if(empty($errores)){
                $vendedor->guardar();
            }
          }
     
        $router->render('vendedores/actualizar',[
             'errores'=>$errores,
             'vendedor'=>$vendedor
        ]);
    }

    public static function  eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT); //VALIDO QUE SEA UN NÚMERO
            if ($id) {
              $tipo = $_POST['tipo'];
              if (validarTipoContenido($tipo)) {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar($id);
              }
            }
          }
    }
 }