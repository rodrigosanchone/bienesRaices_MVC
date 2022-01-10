<?php

namespace App;

/*Active Record   
  Patron de arquitectura para aplicaciones que almacena datos en BD Y CRUD
*/

class Vendedor extends ActiveRecord
{
  protected static  $tabla= 'vendedores';
  protected static  $columnasDB = ['id', 'nombre','apellido','telefono'];

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null; // todo lo que es public se referencia con $this 
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
   
  }

  public function validar() //código de validación
  {
    if (!$this->nombre) {
      self::$errores[] = "Debe añadir un nombre";
    }

    if (!$this->apellido) {
      self::$errores[] = "Debe añadir un apellido";
    }


    if ((!$this->telefono)) {
      self::$errores[] = "Debe añadir un número de teléfono";
    }

    if (strlen($this->telefono)>10) {
      self:: $errores[] = "El teléfono debe tener un maximo de 10 digitos";
    }
   



    return self::$errores;
  }
 
}
