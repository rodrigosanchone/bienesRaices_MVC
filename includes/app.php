<?php

require 'funciones.php'; // incluyo las funciones 
require 'config/database.php'; // inclyto la base de  datos
require __DIR__ . "./../vendor/autoload.php"; //uso el __Dir__ para que el archivo pueda ser usado en cualquier parte

// este es un archivo que manda llamar funciones, base de datos y clases



//conectarnos a la base de datos
$db= conectarBD();

use App\ActiveRecord;

ActiveRecord::setDB($db);
