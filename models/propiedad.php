<?php

namespace App;

/*Active Record   
  Patron de arquitectura para aplicaciones que almacena datos en BD Y CRUD
*/

class Propiedad extends ActiveRecord
{
  protected static  $tabla= 'propiedades';
  protected static  $columnasDB = ['id', 'titulo', 'precio', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId', 'imagen'];

  public $id;
  public $titulo;
  public $precio;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $vendedorId;
  public $creado;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null; // todo lo que es public se referencia con $this 
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->vendedorId = $args['vendedorId'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->creado = date('Y/m/d');


  }

  public function validar() //código de validación
  {
    if (!$this->titulo) {
      self::$errores[] = "Debe añadir un titulo";
    }

    if (!$this->precio) {
      self::$errores[] = "Debe añadir un precio";
    }

    if (strlen($this->descripcion) < 50) {
      $errores[] = "Debe añadir una descripción y debe tener un minimo de 50 caracteres";
    }

    if (!$this->habitaciones) {
      self::$errores[] = "Debe añadir un número de habitaciones";
    }

    if (!$this->wc) {
      self::$errores[] = "Debe añadir un número de baños";
    }

    if (!$this->estacionamiento) {
      self::$errores[] = "Debe añadir un número de estacionamiento";
    }

    if (!$this->vendedorId) {
      self::$errores[] = "Elige un vendedor";
    }

    if (!$this->imagen) {
      self::$errores[] = "Tiene que ingresar una imagen ";
    }


    return self::$errores;
  }

}
