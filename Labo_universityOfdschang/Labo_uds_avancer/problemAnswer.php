<?php  
session_start();

require_once('include/header.php');
require_once('include/navbar.php'); 

require_once('class/Database.php');
require_once('class/SendMail.php');


?>

<head>
	<style type="text/css">
		h1{
		  margin-top: 10%;
		  margin-bottom: 2%;
		  text-align: center;
		  justify-content: center;
		  color: gray;
	    }

	    h2{
		  margin-top: 2%;
		  margin-bottom: 2%;
		  text-align: center;
		  justify-content: center;
		  color: gray;
	    }

       .comment-form-container {
	     /*background: #F0F0F0;*/
	     border: #e0dfdf 1px solid;
	     padding: 20px;
	     border-radius: 4px;
       }

      .input-row {
	     margin-bottom: 20px;
      }

      .input-field {
	     width: 100%;
	     border-radius: 4px;
	     padding: 10px;
	     border: #e0dfdf 1px solid;
      }

      .btn-submit {
	     padding: 10px 20px;
	     background: #333;
	     border: #1d1d1d 1px solid;
	     color: #f0f0f0;
	     font-size: 0.9em;
	     width: 100px;
	     border-radius: 4px;
	     cursor: pointer;
      }
      ul {
	     list-style-type: none;
      }

      .outer-comment {
	    /*background: #F0F0F0;*/
	    /*width: 80%;*/
	    margin-left:40px;
	    margin-right: 40px;
	    margin-bottom: 5px;
	    padding: 20px;
	    border: #dedddd 1px solid;
	    border-radius: 4px;
       }

       span.comment-row-label {
	    color: #484848;
       }

       span.posted-by {
	    font-weight: bold;
       }

       .comment-info {
	    font-size: 0.9em;
	    padding: 0 0 10px 0;
      }

      .comment-text {
	   margin: 10px 0px 30px 0;
	   color: #3a3a3a;
	   overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/

      }

      /*je donne une marge en haut entre mon document et le message*/
      .comment-doc{
      	margin-top: 2px;
      	margin-bottom: 30px;
      	
      }

      .label {
	   padding: 0 0 4px 0;
      }

      img#loader {
	   vertical-align: middle;
	   width: 45px;
	   display: none;
      }

      .comment-row {
	   border-bottom: #e0dfdf 1px solid;
	   margin-bottom: 15px;
	   padding: 15px;
      }

      .answer {
	   cursor: pointer;
	   text-align: center;
      }

      /*je stylise le bouton de retour*/

      .answer .backbtn{
	   margin-top: 4%;
	   margin-bottom: 1%;
       padding: 10px;
       border-radius: 10px;
       background: black;

      }
      .answer .boutonBack{
	   text-decoration: none;
       color: white;
      }

      #comment-count {
	   border-bottom: 1px solid #F0F0F0;
	   border-top: 1px solid #F0F0F0;
	   padding: 8px;
	   font-size: 0.9em;
	   text-align: right;
     }

       
       /*media queries*/
       @media only screen and (max-width: 980px) {
       	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 18px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 18px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }
        
      }
       @media only screen and (max-width: 568px) {
       	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 18px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 18px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }
        
      }
       @media only screen and (max-width: 480px) {
       	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 16px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 16px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }
        
      }
       @media only screen and (max-width: 320px) {
       	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 14px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 14px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }

        
      }

      @media only screen and (max-width: 360px) {
      	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 18px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 15px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }
        
      }


	</style>
</head>

<div class="see-problem">
	 
	 <?php 
         if (isset($_GET['problem_id']) AND !empty($_GET['problem_id'])) {

         	$id = $_GET['problem_id'];

            $sql =" SELECT * FROM probleme
                 LEFT JOIN user
                   ON probleme.id_sender = user.id_user 
                 WHERE  id_pb = $id";

            $stmt = Database::getInstance()
                    ->getDb()
                    ->prepare($sql);
            $stmt->execute();
            $row =  $stmt->fetch(PDO::FETCH_ASSOC);
         }

	  ?>

    <!-- injection des donnees dans la vue -->

     <h1><u>Probl&egrave;me</u></h1>


    <div id="comment-" <?=$row["id_pb"];?> class="comment-info">
	  <div class="outer-comment">
		<div class="comment-info">
			<span class="commet-row-label">from</span> <span class="posted-by"><?=$row["nom"];?> <?= " ";?><?=$row["prenom"];?></span>
			<span class="commet-row-label">at </span> <?=$row["dateP"];?>
		</div>
		<div class="comment-text" id="msgdiv"><?=$row["messageP"];?></div>

		<div class="comment-doc" id="docdiv"><a href ="document_dir/document_probleme/'<?=$row["documentP"];?>" download>  <?=$row["documentP"];?> ==> Download </a></div>


		<div class="answer" name="answer" id="answer">

			<button class="backbtn">
               <a href="problemes.php" class="boutonBack">Retour</a>
            </button> 

		</div>
	</div>
   </div>

</div>


<!-- get all reponse/suggestion memeber -->
<h2><u>Reponse</u></h2>

<div class="get_all_reponse" id="get_all_reponse">
	

</div>


<!-- partie d'ajout/insertion des reponses en bd -->

<?php 

  if (isset($_POST['btnsub'])) {

   if ( isset($_POST['message']) AND  isset($_FILES['document']["name"]) AND !empty($_FILES['document']["name"]) AND !empty($_POST['message']) ) {


          $problem_id = $_GET['problem_id'];

          $answer = htmlentities($_POST['message']); //convertion des chaine de caractere et quotes

          $docu =  basename($_FILES["document"]["name"]);

          // Set document placement folder
          $target_dir = "document_dir/document_reponse/";

          $target_file = $target_dir . basename($_FILES["document"]["name"]);


          // je use ma var session pour recuperer les info du user qui va repondre a la  question : c'est pour eviter les jointure apres

          $email =  $_SESSION['id'];

          $sqlQuery = "SELECT nom,prenom FROM user WHERE email=:email";

          $stmt = Database::getInstance()
                  ->getDb()
                  ->prepare($sqlQuery);
          $stmt->bindParam(":email", $email);
          $stmt->execute();
          $res = $stmt->fetch(PDO::FETCH_ASSOC);

          $memberinfo = $res['nom'].' '.$res['prenom'];
      
           // ajout finql du post

          // Get file extension
          $docExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          // Allowed file types
          $allowd_file_ext = array("pdf", "doc", "docx");

          if (in_array($docExt, $allowd_file_ext)) {


          if (!($_FILES["document"]["size"] > 2097152) ) {


             if (!file_exists($target_file)) {

               if(move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)){

                   $sql = "INSERT INTO reponse
                           SET
                             problem_id=:pb_id, sender_id=:senduser, messageR=:msg,documentR=:doc";
                   $stmt = Database::getInstance()
                          ->getDb()
                          ->prepare($sql);
                   $stmt->bindParam(":pb_id", $problem_id);
                   $stmt->bindParam(":senduser", $memberinfo);
                   $stmt->bindParam(":msg", $answer);                                                   
                   $stmt->bindParam(":doc", $docu);                                                   
                   $stmt->execute();
                   $stmt->fetch();


                   //apres avoir inserer un nouveau probleme  en bd on doit notifier les users

                  // je creais une instance de ma classe SendMail.

                  $sendEmail  = new SendMmail;

                  // je construis mon mail

                  $statusActif = 1 ;

                  $sqlQuery = "SELECT email_user FROM  subcribeNotification WHERE status=:satut";

                  $stmt = Database::getInstance()
                        ->getDb()
                        ->prepare($sqlQuery);
                  $stmt->bindParam(":satut", $statusActif);
                  $stmt->execute();

                  if($stmt->rowCount() > 0 ) {

                      $numRows = $stmt->fetch(PDO::FETCH_ASSOC);

                      $url  = "https://" . $_SERVER['SERVER_NAME'] . "/Labo/problemAnswer.php";

                      $to = $numRows['email'];
                      $subject = "Your Are Subscribe Notification To receive More Notification When Problem is Reply  ";
                      $msg ='<p style="color:grey; font-size: 32px;" > Hi ' . $to . '</p><p  style="color:grey; font-size: 16px;" >   You are almost done.Click below to see The new Reaction  who append</p> 
                        <p><a style="background-color: grey;
                         border: none;
                         border-radius: 5px;
                         color: white;
                         padding: 15px 32px;
                         text-align: center;
                         display: inline-block;
                         font-size: 16px;
                         margin: 4px 2px;
                         cursor: pointer;
                         transition-duration: 0.4s;"
                         href="' . $url . '">Voir L\' cette nouvelle intervention d\'un membre...</a></p>
                         <p>Or copy this link :'.$url.'</p>';

                     $msg = wordwrap($msg,70);

                     // $headers = "From: emailhebergeur@gmail.com";

                     $sendEmail->send($email, $subject, $body);
                   }  

               }
          
             }else{
        
              $errors['msg'] = "File already exists.";
            } 
         }else{
             $errors['msg'] = "File is too large. File size should be less than 2 megabytes.";
            
         } 

        }else{
           $errors['msg'] = "Allowed file formats .pdf, .doc and .docx.";
        }  

   
   }else{
       $errors['msg'] = "Any Field are Empty";
   }

 }



 ?>



<!-- field to add response -->

<div class="sol-problem">
	
     <h1><u>Post response </u></h1>
     <div class="comment-form-container">
        <form id="frmComment" method="post" enctype="multipart/form-data" action="">

            <div class="input-row">
                <div class="label">
                    
                    <?php 
                      if (!empty($errors['msg'])) {
                         echo '<font color="red">'.$errors['msg'].'</font>';
                      }else{
                        echo "Message:";
                      }
                     ?> 

                </div>
                <textarea class="input-field" id="message"
                    name="message" rows="4"  autocomplete="off"></textarea>
            </div>

            <div class="input-row">
                <div class="label">
                    Joindre Un fichier: <span id="join-doc"></span>
                </div>
                <input type="file" name="document" accept=".doc,.pdf,.docx">
            </div>

            <div>
                <input type="hidden" name="add" value="post" />
                <button type="submit" name="btnsub" id="submitButton" class="btn-submit">Publish</button>
            </div>
        </form>
     </div>

</div>


<script type="text/javascript">
 


(function show_answer(execute = 1)
    {
        var req = new XMLHttpRequest();
		var url = 'function/problem.php';
        req.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("get_all_reponse").innerHTML= this.response;
                document.getElementById('succes-ask').style.display='inline-block';

           
            }
        };
        req.open("POST", url, true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        let parameters = "problemID=" + <?=$_GET['problem_id'];?> +"&value=" +execute;
		req.send(parameters);


    })();


</script>

<?php  require_once('include/footer.php') ?>
