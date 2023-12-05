<?php 
require_once('../class/Database.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/PHPMailer/src/PHPMailer.php';
require '../PHPMailer/PHPMailer/src/Exception.php';
require '../PHPMailer/PHPMailer/src/SMTP.php';



if ( isset($_POST['value']) AND !empty($_POST['value'])){

	switch ($_POST['value']) {

		case '1':
			 verification_action();
			break;

		case '2':
			 saveNewPassword();
			break;	    			
		
		default:
			# code...
			break;
	}

}else{
	echo " Error";
}



 function verification_action()
 {
 	# code...
  $jsonResponse = array ();

  if(isset($_POST['action']) && isset($_POST['userEmail']) && !empty($_POST['action']) && $_POST['action'] == 'forgetPassword') {	

	if(!empty($_POST['userEmail']) && filter_var($_POST['userEmail'],FILTER_VALIDATE_EMAIL)) {

		$email = $_POST['userEmail'];

		$userDetails = resetPassword($email);

		if($userDetails){		
			$message = "Password reset link send. Please check your mailbox to reset password.";
			$status = 1;
		} else {
			$message = "No account exist with entered username and email address.";
			$status = 0;
		}

	} else {
		$message = 'Please enter Correct email to proceed with password reset';
		$status = 0;
    }		  

 }else{
 	$message = "Any field are empty";
 	$status = 0;
 }

 $jsonResponse = array (
		"message"	=> $message,
		"success" => $status	
  );
 // print_r($jsonResponse);

 echo json_encode($jsonResponse);

}

// fin



// si tout est correct fonction d'envoi du lien via le service mail 

function resetPassword($email){

	$sqlQuery = "SELECT email FROM user WHERE email=:email";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sqlQuery);
	$stmt->bindParam(":email", $email);
    $stmt->execute();

    if($stmt->rowCount() > 0 ) {

        $numRows = $stmt->fetch(PDO::FETCH_ASSOC);

        $url  = "https://" . $_SERVER['SERVER_NAME'] . "/Labo/reset_password.php?authtoken=".md5($numRows['email']);
        $url2  = "https://fotso22.github.com";

		$to = $numRows['email'];
		$subject = "Reset your password  / password recorvery";
		$msg ='<p style="color:grey; font-size: 32px;" > Hi ' . $email . '</p><p  style="color:grey; font-size: 16px;" >   You are almost done.Click below to set a new password</p> 
             <p><a style="background-color: grey;
            border: none;
            border-radius: 5px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;"
            href="' . $url . '">Change Password</a></p>
            <p>Or copy this link :'.$url.'</p>
            <p  style="color:red; font-size: 10px;" > Need Help ? <a  href="' . $url2 . '">Contact Us</a></p>';

		$msg = wordwrap($msg,70);
		$headers = "From: fotyvarosly@gmail.com";

		sendmail($msg,$subject,$to);

		return true;

    }else{
	  return false;
	}
}

// fin 




// Deuxieme partie pour partie pour save le nouveau password 

function saveNewPassword(){

if (isset($_POST['action']) && isset($_POST['newPassword'])&& isset($_POST['confirmNewPassword']) && isset($_POST['authtoken'])) {


 if(!empty($_POST['action']) && $_POST['action'] == 'savePassword' && !empty($_POST['authtoken']) && !empty($_POST['newPassword']) && !empty($_POST['confirmNewPassword'])) {

	if($_POST['newPassword'] != $_POST['confirmNewPassword']) {

		$message = "Password does not match the confirm password field";
		$status = 0;
	}else{

		$token = $_POST['authtoken'];
		$passVal = $_POST['newPassword'];

		$isPasswordSaved = savePassword($token,$passVal);

		if($isPasswordSaved) {
			$message = "Password saved successfully.";
			$status = 1;
		} else {
			$message = "Invalid Email are use change request.";
			$status = 0;
		}
	}
 }else{
 	$message = "Any field are empty";
 	$status = 0;
 }

}

  $jsonResponse = array (
		"message"	=> $message,
		"success" => $status	
  );
 
 echo json_encode($jsonResponse);

}



//deuxiemen partie





function savePassword($jeton,$pass){

     $sqlQuery = "SELECT email, authtoken 
			        FROM user
			         WHERE authtoken=:authtoken";	

     $stmt = Database::getInstance()
                ->getDb()
                ->prepare($sqlQuery);
     $stmt->bindParam(":authtoken", $jeton);
     $stmt->execute();

     if($stmt->rowCount() > 0 ) {

        $numRows = $stmt->fetch(PDO::FETCH_ASSOC);
				
	    $email = $numRows['email'];
	    $passCrypt = md5($pass); //pour eviter le passage par reference

	    $sqlQuery = " UPDATE user 
				       SET password=:password
                       WHERE email=:email AND authtoken=:authtoken";
        $stmt = Database::getInstance()
                           ->getDb()
                           ->prepare($sqlQuery);
	    $stmt->bindParam(":password",$passCrypt );
	    $stmt->bindParam(":email", $email);               
	    $stmt->bindParam(":authtoken", $jeton);
        $stmt->execute();
			
	    return true;
    } else {
	    return false;
	}	

}



function sendmail($contenu,$objet,$destinataire) {  


// on crée une nouvelle instance de la classe
$mail = new PHPMailer(true);

try {
   

    $mail->setLanguage('fr', 'PHPMailer/PHPMailer/language');   // pour avoir les messages d'erreur en FR
    
    // $mail->SMTPDebug = 2;   // en production (sinon "2")

    $mail->SMTPDebug = 0;                                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                      
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'fotyvarosly@gmail.com';         
    $mail->Password   = 'vousetmoi';                         
    $mail->SMTPSecure = 'tls';                           
    $mail->Port       = 587;      

    // $mail->addReplyTo('No-Reply@gmail.com', 'Labo');
    $mail->setFrom('fotyvarosly@gmail.com', 'Labo');

    $mail->addAddress($destinataire, 'Clients de Mon_Domaine / User');
    $mail->AddEmbeddedImage('../static/images/index-icon/LOGO.jpg', 'logo');

    
    $mail->Subject = $objet;
    $mail->Body    = "<center><p><img width=\"200\" height=\"95\" src=\"cid:logo\" /></p>".$contenu."</center>";
    $mail->AltBody = "<center><p><img width=\"200\" height=\"95\" src=\"cid:logo\" /></p>".$contenu."</center>";
    $mail->isHTML(true);
    $mail->send();


    return true;
  } catch (Exception $e) {
    return false;
  } 


} 



 ?>