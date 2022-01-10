<?php

//require 'app.php'; ya no es necesario en POO, pues causaria un loop



define('TEMPLATES_URL', __DIR__.'/templates'); // muevo estas constantes de app.php a funciones.php
define('FUNCIONES_URL',__DIR__.'funciones.php');
define('CARPETA_IMAGENES',__DIR__.'../../imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL ."/${nombre}.php";
}

function estaAutenticado(){
        session_start();

        if(!$_SESSION['login']){
            header('Location /');
           
        }

      
}

function debuguear($variable){
        echo "<pre>";
        var_dump($variable);
        echo  "</pre>";   
}


//escapar-sanitizar el html
function s($html):string{
   $s = htmlspecialchars($html);
   return $s;
}

//validar tipo de contenido
function validarTipoContenido($tipo){
   $tipos=['vendedor','propiedad'];

   return in_array($tipo, $tipos);//nos permite buscar un string o valor dentro de un arreglo
}

//Mostrar mensajes 
function mostrarNotificaciones($codigo){
  $mensaje = '';

  switch($codigo){
      case 1: 
         $mensaje= "Creado Correctamente";
         break;
         case 2: 
            $mensaje= "Actualizado Correctamente";
            break;
            case 3: 
                $mensaje= "eliminado Correctamente";
                break;
       default: 
          $mensaje= "false";
          break;
  }
  return $mensaje;
}