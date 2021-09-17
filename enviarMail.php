<?php

$nombre = $_POST["nombre"];
$nombre = $_POST["apellido"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = '<h1>Contato via WebPage</h1>'.
'<p><b>Nombre Completo:</b> '.$nombre.'</p>'.
'<p><b>Email:</b> '.$correo.'</p>'.
'<p><b>Telefono:</b> '.$telefono.'</p>'.
'<p><b>Consulta:</b></p>'.
'<p>'.$mensaje.'</p>';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;

require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';
require './PHPMailer-master/src/Exception.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '*****************';                     //SMTP username
    $mail->Password   = '**********';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('', 'Formulario de Contacto WebSite');
    $mail->addAddress('', 'Docampo-Abogados');     //Add a recipient
    
    //Content
    $mail->isHTML(true);    
    $mail->Charset = 'UTF-8';                              //Set email format to HTML
    $mail->Subject = 'Email enviado desde Docampo&Abogados WebPage';
    $mail->Body    = $body;

    $mail->send();
    echo '<script>
        window.history.go(-1);
        </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}