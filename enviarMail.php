<?php
echo getcwd();

ini_set('display_errors', 1);

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " .$nombre . "<br>Correo " . $correo . "<br>Telefono:" . $telefono ."<br>Mensaje: " . $mensaje;


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
    $mail->Username   = '**********';                     //SMTP username
    $mail->Password   = '**********';                               //SMTP password
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('menendezbruno@gmail.com', 'maradoo0');
    $mail->addAddress('menendezbruno@gmail.com', 'Joe User');     //Add a recipient
    
    //Content
    $mail->isHTML(true);    
    $mail->Charset = 'UTF-8';                              //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Here is the body';

    $mail->send();
    echo '<script>
        window.history.go(-1);
        </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}