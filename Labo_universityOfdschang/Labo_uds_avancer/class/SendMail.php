<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// je je met la source comme ceci :../PHPMailer/PHPMailer/src/PHPMailer.php  il y'au aurait erreur dans les fichier qui' il inclut ce fichier car ces fichier sont a la meme racine que celui du dossier PHPMailler

require 'PHPMailer/PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';


class SendMmail {

   public function send($email, $subject, $body){


     $mail = new PHPMailer(true);

     try {

        $mail->SMTPDebug = 2;  //en production                                    
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                      
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = '****@gmail.com';         
        $mail->Password   = '*****';                         
        $mail->SMTPSecure = 'tls';                           
        $mail->Port       = 587;      

        $mail->addReplyTo('****@gmail.com', 'Labo-Educ');
        $mail->setFrom('****@gmail.com', 'Labo-Educ');
        $mail->addAddress($email);
        $mail->AddEmbeddedImage('../static/images/index-icon/LOGO.jpg', 'logo');

        $mail->Subject = $subject;
        $mail->Body    = "<center><p><img width=\"200\" height=\"95\" src=\"cid:logo\" /></p>".$body."</center>";
        $mail->AltBody = "<center><p><img width=\"200\" height=\"95\" src=\"cid:logo\" /></p>".$body."</center>";
        $mail->isHTML(true);
        
        $mail->send();

        return true;

      } catch (Exception $e) {
        
        return false;

      }
    }




 }