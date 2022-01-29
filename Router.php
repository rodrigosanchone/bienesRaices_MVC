<?php

namespace MVC;

class Router{
    public $rutasGET=[];
    public $rutasPOST=[];
    public function get($url, $fn){
        $this->rutasGET[$url]=$fn;
    }
    public function post($url, $fn){
      $this->rutasPOST[$url]=$fn;
  }
    public function comprobarRutas(){

      session_start();

      $auth= $_SESSION['login'] ?? null;

      //debuguear($auth);
          
      //Arreglo de rutas protegidas

      $rutas_protegidas = ['/admin','/propiedades/crear','/propiedades/actualizar','/propiedades/eliminar','/vendedores/crear','/vendedores/actualizar','/vendedores/eliminar'];

          $urlActual = $_SERVER['PATH_INFO']?? '/';
          $metodo =  $_SERVER['REQUEST_METHOD'];
           
        if($metodo === 'GET'){
          $fn= $this->rutasGET[$urlActual] ?? null;
        }  else{
         
          $fn= $this->rutasPOST[$urlActual] ?? null;
        }

        //proteger las rutas
        if(in_array($urlActual,$rutas_protegidas)&& !$auth){
          //echo "Es una ruta proyegida";
          header('Location: /');

          return;
        }

        if($fn){
            //La URL existe y hay una función asociada
            call_user_func($fn, $this);
        }else{
           echo "página no encontrada";
        }
    }

    //muestra una vista
    public function render($view, $datos=[]){
        
      foreach($datos as $key =>$value){
          $$key = $value;//la llave, el  mensaje sera el valor, el doble signo de dolar significa variable de variable
      }
        ob_start(); // inicia un almacenamiento en memoria 
       include __DIR__ . "/views/$view.php";
       $contenido= ob_get_clean();// lipiamos lo que que esta en memoria b 
       include __DIR__ ."/views/layaout.php";
    }
}