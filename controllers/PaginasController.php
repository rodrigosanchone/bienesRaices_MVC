<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;






class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {

        $router->render('paginas/nosotros', []);
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad,
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog', []);
    }

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada', []);
    }

    public static function contacto(Router $router)
    {  

        $mensaje  = null;
       
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];
            $mail = new PHPMailer();
           
      
                //Server settings
                $mail->MAILER='smtp';                     //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'f0111064056303';                     //SMTP username
                $mail->Password   = 'b3cdb0389ab8ed';                               //SMTP password
              //  $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';   
                $mail->_ENCRYPTION='tls' ;        //Enable implicit TLS encryption
                $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('admin@bienesraices.com', 'Mailer');
                $mail->addAddress('admin@bienesraices.com', 'Joe User');     //Add a recipient
               
            
                //Attachments
               // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
               // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $contenido='<html>';
                $contenido .= '<p>Tienen un mensaje nuevo</p>';
                $contenido .= '<p>Nombre :' . $respuestas['nombre'] . '</p>';
                $contenido .= '<p>Contactar por  :' . $respuestas['contacto'] . '</p>';
                //enviar en forma condicional  algunos campos (email o teléfono)
                if($respuestas['contacto']==='telefono'){
                  //datos teléfonos
                  $contenido .= '<p>Eligió ser conctactado en este teléfono :' . $respuestas['telefono'] . '</p>';
                  $contenido .= '<p>Fecha para contactar  :' . $respuestas['fecha'] . '</p>';
                  $contenido .= '<p>Hora para contactar  :' . $respuestas['hora'] . '</p>';
                }else{
                    //email.
                    $contenido .= '<p>Eligió ser contactado por este email:' . $respuestas['email'] . '</p>';  
                }
              
                $contenido .= '<p>Acción :' . $respuestas['tipo'] . '</p>';
                $contenido .= '<p>Precio : $' . $respuestas['precio'] . '</p>';
             
              
                $contenido .= '<p>Mensaje  :' . $respuestas['mensaje'] . '</p>';
                $contenido .=  '</html>';
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->CharSet= 'UTF-8';
                $mail->Subject = 'Here is the subject';
                $mail->Body    = $contenido;
                $mail->AltBody = 'Este es un mensaje ';

           
            
          if( $mail->send()){
              $mensaje= "Mensaje enviado :)";
            } else {
                 $mensaje= "Lo sentimos hubo un error :(";
            }
        
    }

    $router->render('paginas/contacto', [
        'mensaje'=>$mensaje
    ]);
    }
}
