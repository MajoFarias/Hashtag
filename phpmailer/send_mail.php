<?php


require 'class.phpmailer.php';
require 'class.subphpmailer.php'; //Para php 5.6
require 'class.smtp.php';

$mail = new subPHPMailer;

$nombre  = $_POST['nombre'];
$empresa = $_POST['empresa'];
$email   = $_POST['email'];
$telefono = $_POST['telefono'];
$seccion  = $_POST['seccion'];
$mensaje  = $_POST['mensaje'];


$message = '<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>hola</title>
			  <link rel="stylesheet" href="">
			</head>
			<body>
				<br>Nombre: '.$nombre.'
				<br>Empresa: '.$empresa.'
				<br>Email: '.$email.'
				<br>Telefono: '.$telefono.'
				<br>Sección: '.$seccion.'
				<br>Mensaje: '.$mensaje.'
			</body>
			</html>';

//$mail->SMTPDebug = 2;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = 'secure.emailsrvr.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "postmaster@gamol.net";
$mail->Password = "NnXEf6";   

$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to



$mail->From         = 'not_reply@hashtag.com';
$mail->FromName     = 'Info';
$mail->addAddress('van.m285@gmail.com'); 

$mail->isHTML(true); 
$mail->Subject = "CONTACTO HASHTAG ".strtoupper($seccion);
$mail->Body = $message;


if(!$mail->send()) {
    echo 'Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mensaje enviado correctamente';
}

