<?php

function conectarBD(): mysqli{
    $db = new mysqli('b31knecfodjksd0qhj7f-mysql.services.clever-cloud.com','u3qvvuyelwgrfrlq','OjfF3JfG3ktFmDUHVgk7','b31knecfodjksd0qhj7f');

   /*  if($db){
      echo "Conexion exitosa";
    }else{
        echo "No hay conexión";
    } */

    if(!$db){
        echo "No hay conexión";
        //exit;
    }

    return $db;
    //echo "conectado ";
}