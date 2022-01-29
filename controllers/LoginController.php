<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{

  public static function login(Router $router)
  {
    $errores = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $auth = new Admin($_POST);
      $errores = $auth->validar();

      if (empty($errores)) {
        //verificar si el usuario existe 
        $resultado =  $auth->existeUsuario();
        if (!$resultado) {
          //verificar usuario
          $errores = Admin::getErrores();
        } else {
          //verificar el password
             $autenticado= $auth->comprobarPassword($resultado);

              if($autenticado){
                   //Autenticar usuario
                   $auth->autenticar();

              }else{
                //obtengo los errores
                $errores = Admin::getErrores();
              }
        }



        //autenticar el usuario
      }
    }
    $router->render('auth/login', [
      'errores' => $errores
    ]);
  }


  public static function logout()
  {
    session_start();
    //debuguear($_SESSION);

    $_SESSION=[];
    header('Location: /');
  }
}
