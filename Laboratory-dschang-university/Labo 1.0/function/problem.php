<?php 
session_start();


require_once('../class/Database.php');


if ( isset($_POST['value']) AND !empty($_POST['value'])){

	switch ($_POST['value']) {

		case '1':
			 add_problem();
			break;

	  case '2':
			 add_answer ();
			break;

    case '3':
       show_answer();
      break;  	

    case '4':
       statusNotification();
      break;  

    case '5':
       seeActive();
      break;         
  	

		default:
			# code...
      echo "Error";

			break;
	}

}else{
	echo " Error";
}



function add_problem()
{
	# code...

    if ( isset($_POST['problem']) AND !empty($_POST['problem']) AND !($_POST['problem'] == " " ) AND strlen($_POST['problem']) > 10) {
	
         $pb = $_POST['problem'];

          // je use ma var session pour recuperer les info du poseur de question : c'est pour eviter les jointure apres

          $email =  $_SESSION['id'];

          $sqlQuery = "SELECT id_user FROM user WHERE email=:email";

          $stmt = Database::getInstance()
                  ->getDb()
                  ->prepare($sqlQuery);
          $stmt->bindParam(":email", $email);
          $stmt->execute();
          $res = $stmt->fetch(PDO::FETCH_ASSOC);

          $memberinfo = $res['id_user'];
      
           // ajout finql du post
          $sql = "INSERT INTO probleme
                   SET
                   id_sender=:senduser, messageP=:msg";
          $stmt = Database::getInstance()
                  ->getDb()
                  ->prepare($sql);
          $stmt->bindParam(":senduser", $memberinfo);
          $stmt->bindParam(":msg", $pb);                                                   
          $stmt->execute();
          $stmt->fetch();

          $errors = array();

          $errors['status'] = 1;
   
   }else{
    // echo "The Field Problem Is required";
      $errors['status'] = -1;
   } 

   echo json_encode($errors);
}






function add_answer ()
{
  # code...

    if ( isset($_POST['answer']) AND isset($_POST['problemID']) AND !empty($_POST['problemID']) AND !empty($_POST['answer']) AND !($_POST['answer'] == " " ) AND strlen($_POST['answer']) > 10) {


         $problem_id = $_POST['problemID'];

         $answer = $_POST['answer'];

          // je use ma var session pour recuperer les info du poseur de question : c'est pour eviter les jointure apres

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
          $sql = "INSERT INTO reponse
                   SET
                    problem_id=:pb_id, sender_id=:senduser, messageR=:msg";
          $stmt = Database::getInstance()
                  ->getDb()
                  ->prepare($sql);
          $stmt->bindParam(":pb_id", $problem_id);
          $stmt->bindParam(":senduser", $memberinfo);
          $stmt->bindParam(":msg", $answer);                                                   
          $stmt->execute();
          $stmt->fetch();

          $errors = array();

          $errors['status'] = 1;
   
   }else{
    // echo "The Field Problem Is required";
      $errors['status'] = -1;
   } 

   echo json_encode($errors); 
}





function show_answer()
{
  
   // $sqlQuery = "SELECT id_rp,id_pb,sender_id,messageR ,dateR FROM reponse r
   //                INNER JOIN  probleme p 
   //                  WHERE r.problem_id = p.id_pb
   //                    ORDER BY r.dateR DESC 
   //              ";


  $pbID = $_POST['problemID'];

  $sqlQuery = "SELECT id_rp,problem_id,sender_id,messageR ,dateR 
                FROM reponse 
                  WHERE problem_id =:valID
                ORDER BY dateR DESC ";

   $stmt = Database::getInstance()
          ->getDb()
          ->prepare($sqlQuery);
   $stmt->bindParam(":valID", $pbID);
   $stmt->execute();
   
   $outputString = '';
  
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
   // foreach($stmt as $row): 
  
   // foreach begin sont parcour a 2 

    $outputString.= '
     <div id="comment-'.$row["id_rp"].' class="comment-info">
        <div class="outer-comment">
          <div class="comment-info">
            <span class="commet-row-label">from</span> <span class="posted-by">'.$row["sender_id"].'</span>
            <span class="commet-row-label">at</span>  '.$row["dateR"].'
          </div>
          <div class="comment-text" id="msgdiv">'.$row["messageR"].'</div>
        </div>
     </div>
   ';

    // endforeach;
  }

  echo $outputString;

}


function statusNotification(){


    
    $mail =  $_SESSION['id'];

    $statusValue = $_POST['newStatus'];
   
    $query = "UPDATE subcribeNotification 
              SET status=:new 
              WHERE email_user=:mail";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->bindParam(":new", $statusValue);
    $stmt->bindParam(":mail", $mail);
    $stmt->execute();



    $sql = "SELECT status FROM subcribeNotification 
            WHERE email_user=:mail";

    $stmt2 = Database::getInstance()
            ->getDb()
            ->prepare($sql);
    $stmt2->bindParam(":mail", $mail);
    $stmt2->execute();

    // je declare va ma define_syslog_variables()
    $status = 0;

    if ($stmt2->rowCount() > 0) {
     
      $fetchStatus = $stmt2->fetch(PDO::FETCH_ASSOC);
      $status = $fetchStatus['status'];
    }

    echo $status;

}




function seeActive(){

    $mail =  $_SESSION['id'];
    
    $sql = "SELECT status FROM subcribeNotification 
            WHERE email_user=:mail";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
    $stmt->bindParam(":mail", $mail);
    $stmt->execute();

    // je declare va ma define_syslog_variables()
    $status = 0;

    if ($stmt->rowCount() > 0) {
     
      $fetchStatus = $stmt->fetch(PDO::FETCH_ASSOC);
      $status = $fetchStatus['status'];
    }

    echo $status;
}

 ?>