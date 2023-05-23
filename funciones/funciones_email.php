<?php 
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function enviarEmailActivacion($nombre,$email,$idUser){
   $id=$idUser;
   $name = $nombre;
   $email = $email;

   /*Enviamos el mail*/
   include('plantilla_email/plantilla_activacion.php');


   //Create instance of PHPMailer
	$mail = new PHPMailer();
   //Set mailer to use smtp
      $mail->isSMTP();
   //Define smtp host
      $mail->Host = "smtp.gmail.com";
   //Enable smtp authentication
      $mail->SMTPAuth = true;
   //Set smtp encryption type (ssl/tls)
      $mail->SMTPSecure = "tls";
   //Port to connect smtp
      $mail->Port = "587";
   //Set gmail username
      $mail->Username = "rcontrerasna@uoc.edu";
   //Set gmail password
      $mail->Password = "RafaUoc55%";
   //Email subject
      $mail->Subject = "Tu Scouting";
   //Set sender email
      $mail->setFrom('rcontrerasna@uoc.edu');
   //Enable HTML
      $mail->isHTML(true);
   //Email body
      $mail->Body = plantilla_activacion($name,$id);
   //Add recipient
      $mail->addAddress($email);
   //Finally send email
      if ( $mail->send() ) {
         echo "Se le ha enviado un email para confirmar su cuenta";
      }else{
         echo "Fallo al enviar el email";
      }
   //Closing smtp connection
      $mail->smtpClose();
}
function enviarEmailRecuperacionPass($nombre,$email,$pass){
   $name = $nombre;
   $email = $email;

   /*Enviamos el mail*/
   include('plantilla_email/plantilla_envioPass.php');


   //Create instance of PHPMailer
	$mail = new PHPMailer();
   //Set mailer to use smtp
      $mail->isSMTP();
   //Define smtp host
      $mail->Host = "smtp.gmail.com";
   //Enable smtp authentication
      $mail->SMTPAuth = true;
   //Set smtp encryption type (ssl/tls)
      $mail->SMTPSecure = "tls";
   //Port to connect smtp
      $mail->Port = "587";
   //Set gmail username
      $mail->Username = "rcontrerasna@uoc.edu";
   //Set gmail password
      $mail->Password = "RafaUoc55%";
   //Email subject
      $mail->Subject = "Tu Scouting";
   //Set sender email
      $mail->setFrom('rcontrerasna@uoc.edu');
   //Enable HTML
      $mail->isHTML(true);
   //Email body
      $mail->Body = plantilla_recuperarPass($name,$pass);
   //Add recipient
      $mail->addAddress($email);
   //Finally send email
      $mail->send();
      
   //Closing smtp connection
      $mail->smtpClose();
}

function enviarEmailActualizacionEmail($nombre,$email,$idUser){
      $name = $nombre;
      $email = $email;
      $id=$idUser;
   
      /*Enviamos el mail*/
      include('plantilla_email/plantilla_actualizacion_email.php');
   
   
      //Create instance of PHPMailer
      $mail = new PHPMailer();
      //Set mailer to use smtp
         $mail->isSMTP();
      //Define smtp host
         $mail->Host = "smtp.gmail.com";
      //Enable smtp authentication
         $mail->SMTPAuth = true;
      //Set smtp encryption type (ssl/tls)
         $mail->SMTPSecure = "tls";
      //Port to connect smtp
         $mail->Port = "587";
      //Set gmail username
         $mail->Username = "rcontrerasna@uoc.edu";
      //Set gmail password
         $mail->Password = "RafaUoc55%";
      //Email subject
         $mail->Subject = "Tu Scouting";
      //Set sender email
         $mail->setFrom('rcontrerasna@uoc.edu');
      //Enable HTML
         $mail->isHTML(true);
      //Email body
         $mail->Body = plantilla_actualizacion_email($name,$id,$email);
      //Add recipient
         $mail->addAddress($email);
      //Finally send email
         //$mail->send();
         if ( $mail->send() ) {
            echo "Se le ha enviado un email para confirmar su cuenta";
         }else{
            echo "Fallo al enviar el email";
         }
      //Closing smtp connection
         $mail->smtpClose();
}


function enviarEmailNotificacionOjeador($email,$evento,$fecha,$texto){

   if(!empty($_POST['btnEnviarNotificacionOjeador'])){

   /*Enviamos el mail*/
   include('plantilla_email/plantilla_envio_notificacion_ojeador.php');


   //Create instance of PHPMailer
   $mail = new PHPMailer();
   //Set mailer to use smtp
      $mail->isSMTP();
   //Define smtp host
      $mail->Host = "smtp.gmail.com";
   //Enable smtp authentication
      $mail->SMTPAuth = true;
   //Set smtp encryption type (ssl/tls)
      $mail->SMTPSecure = "tls";
   //Port to connect smtp
      $mail->Port = "587";
   //Set gmail username
      $mail->Username = "rcontrerasna@uoc.edu";
   //Set gmail password
      $mail->Password = "RafaUoc55%";
   //Email subject
      $mail->Subject = "Tu Scouting";
   //Set sender email
      $mail->setFrom('rcontrerasna@uoc.edu');
   //Enable HTML
      $mail->isHTML(true);
   //Email body
      $mail->Body = plantilla_notificacion_ojeador_email($evento,$fecha,$texto);
   //Add recipient
      $mail->addAddress($email);
   //Finally send email
      //$mail->send();
      if ( $mail->send() ) {
         echo "Se le ha enviado un email para confirmar su cuenta";
      }else{
         echo "Fallo al enviar el email";
      }
   //Closing smtp connection
      $mail->smtpClose();
    }
}



?>