<?php 
session_start();


require_once('../class/Database.php');


if ( isset($_POST['value']) AND !empty($_POST['value'])){

	switch ($_POST['value']) {

    case '1':
       show_answer();
      break;  	

    case '2':
       statusNotification();
      break;  

    case '3':
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








function show_answer()
{
  
   // $sqlQuery = "SELECT id_rp,id_pb,sender_id,messageR ,dateR FROM reponse r
   //                INNER JOIN  probleme p 
   //                  WHERE r.problem_id = p.id_pb
   //                    ORDER BY r.dateR DESC 
   //              ";


  $pbID = $_POST['problemID'];

  $sqlQuery = "SELECT id_rp,problem_id,sender_id,messageR,documentR,dateR 
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

          <div class="comment-doc" id="docdiv"><a href ="document_dir/document_reponse/'.$row["documentR"].' " download>  '.$row["documentR"].' ==> Download </a></div>

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