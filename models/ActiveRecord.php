<?php

namespace App;

class ActiveRecord{
      //base de datos 
  protected static $db;  // al ser static el metodo tiene que ser static 
  protected static $tabla =  '';
  protected static  $columnasDB = [];
  //Errores y validaciones
  protected static $errores = []; // arreglo vació que llenamos si hay 
  public $imagen;
  //definir la conexión a la base de datos;
  public static function setDB($database)
  {
    Self::$db =  $database; // todo lo que es stati se referencia con $Self
  }




 

    public function guardar(){
    {
      if (is_null($this->id)) {  
        $this->crear();
      } else {
        //estamos guardando o creando un nuevo registro
        $this->actualizar();
      }
    }
    
    

    
  }

  public function crear()
  {

    //Sanitizar la entrada de los datos
    $atributos = $this->sanitizarDatos();
    //   $string = join(', ', array_keys($atributos)); // creo un string apartir de un arreglo
    //   $string = join(', ', array_values($atributos)); // creo un string apartir de un arreglo
    //echo "Guardando en la base de datos";
    // debuguear($string);
    //insertar en la base de datos
    $query = " INSERT INTO ".  static::$tabla. "(";
    $query .= join(', ', array_keys($atributos));
    $query .= " ) VALUES (' ";
    $query .= join("', '", array_values($atributos));
    $query .= " ')";

    $resultado = self::$db->query($query); // de esta forma se inserta

   //mensdaje de exito
   if ($resultado) {
    header('Location: /admin?resultado=1');
  
}
    
  }

  public function actualizar()
  {
    //sanitizar los datos
    $atributos = $this->sanitizarDatos();
    $valores = [];
    foreach ($atributos as $key => $value) {
      $valores[] = "{$key}='{$value}'";
    }
    $query = " UPDATE ".static::$tabla.  " SET ";
    $query .= join(', ', $valores);
    $query .= "WHERE id ='" . self::$db->escape_string($this->id) . "' ";
    $query .= "LIMIT 1";

    $resultado = self::$db->query($query);

    if ($resultado) {
      debuguear($query);
      header('Location: /admin?resultado=2');
      
    }
  }

  //Eliminar un registro
  public function eliminar($id)
  {
    /**eliminar propiedad de la base de datos */
    $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $resultado = self::$db->query($query);

    if ($resultado) {
      $this->borrarImagen($id);
      header('location: /admin?resultado=3');
    }
  }

  public function atributos()
  {
    //mapeo las columnas todas las columnas de la base de datos identifica y une los atributos de la base datos
    $atributos = [];

    foreach (static::$columnasDB as $columna) {
      if ($columna ===  'id') continue; // cuando se ejecuta esta condícion no se ejecuta el if , en este caso ignora el id y pasa al siguiente elemento del foreach
      $atributos[$columna] = $this->$columna;
    }
    return $atributos;
  }

  public function sanitizarDatos()
  {

    $atributos = $this->atributos();
    //debuguear( 'atributos');

    $sanitizado = [];
    foreach ($atributos as $key => $value) {
      // echo $key . $value;
      $sanitizado[$key] = self::$db->escape_string($value);
    }

    //debuguear($sanitizado);
    return $sanitizado;
  }

  //subida de archivos 
  public function setImagen($imagen)
  {
    //Elimina la imagen anterior
    if (!is_null($this->id)) { // si no esta cómo nulo
      $this->borrarImagen();
    }
    //asignar al atributo de imagen el nombre de la imagen
    if ($imagen) {
      $this->imagen = $imagen;
  
    }
  }

  //borrar imagen de la carpeta
  public function borrarImagen()
  {
    $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
 
    if ($existeArchivo) {
     debuguear(unlink(CARPETA_IMAGENES . $this->imagen));
     
    }
  }

  //validación
  public static function getErrores()
  {
   
    return static::$errores;
  }

  public function validar() //código de validación
  {
    
    static::$errores=[]; 
    return static::$errores;
  }

  //listar todas las propiedades
  public static function all()
  {

    $query = "SELECT * FROM " . static::$tabla;

    $resultado = self::consultarSQL($query);

    return $resultado;
  }

  //obtener un limiatdo número de propiedades
  public static function get($cantidad)
  {

    $query = "SELECT * FROM " . static::$tabla ." LIMIT " . $cantidad;
    
   
    $resultado = self::consultarSQL($query);
     
    return $resultado;
  }

  //busca una propiedad por su id
  public static function find($id)
  {
    $query = "SELECT * FROM " .  static::$tabla ." WHERE id = ${id}";

    $resultado = self::consultarSQL($query);
    return array_shift($resultado);
  }

  public static function consultarSQL($query)
  {
    //consultar la base de datos
    $resultado = self::$db->query($query);
    //Iterar los resultados

    $array = [];
    while ($registro = $resultado->fetch_assoc()) {
      $array[] = static::crearObjeto($registro);
    }
    //liberar la memoria 
    $resultado->free();
    //retornar los resultados
    return $array;
  }

  protected static function crearObjeto($registro)
  {
    $objeto = new static; //crea nuevos obejtos de la clase propiedad
    foreach ($registro as $key => $value) {
      if (property_exists($objeto, $key)) {
        $objeto->$key = $value;
      }
    }
    return $objeto;
  }

  //sincronizar el objeto en memoria con los cambios realizado 
  public function sincronizar($args = [])
  {
    //  debuguear($args);
    foreach ($args as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}