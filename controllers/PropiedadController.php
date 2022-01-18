<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController
{
  public  static function index(Router $router)
  {
    $propiedades= Propiedad::all();
    $resultado= null; 
    $router->render('propiedades/admin',[
     'propiedades'=>$propiedades,
     'resultado'=>$resultado
    ]);
  }

  public  static function crear(Router $router)
  { 
    $propiedad= new Propiedad;
    $vendedores= Vendedor::all();
    //arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

      //crear nueva instancia 
      $propiedad = new Propiedad($_POST['propiedad']);
  
      /**subida de archivos */
  
      //generar un nombre unico para img
      $nombreImagen =  md5(uniqid(rand(), true)) . ".jpg";
  
      //Setear la imagen
      //Realizanmos un resize a la imagen con Intervetion
      if ($_FILES['propiedad']['tmp_name']['imagen']) {
          $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
          $propiedad->setImagen($nombreImagen);
      }

  
      //validar
      $errores = $propiedad->validar();
  
  
      //revisar que no haya errores, que el arreglo de errores este vacio para insertae datos a la base de datos
      if (empty($errores)) {
  
  
          //Crear la carpeta para subir imagenes
          if (!is_dir(CARPETA_IMAGENES)) {
              mkdir(CARPETA_IMAGENES);
          }
          //subir la imagen
          $image->save(CARPETA_IMAGENES . $nombreImagen);
  
          //guarda en la base de datos     
          $propiedad->guardar();
      }
  }

    $router->render('propiedades/crear',[
        'propiedad'=> $propiedad,
        'vendedores'=> $vendedores,
        'errores'=> $errores
     ]);
  }

  public  static function actualizar(Router $router)
  {
     $id = validarORedireccionar('/admin');
     $propiedad = Propiedad::find($id);
     $errores = Propiedad::getErrores();
     $vendedores= Vendedor::all();
    $router->render('/propiedades/actualizar',[
      'propiedad'=> $propiedad,
      'vendedores'=> $vendedores,
      'errores'=> $errores
    ]);

  }
}
