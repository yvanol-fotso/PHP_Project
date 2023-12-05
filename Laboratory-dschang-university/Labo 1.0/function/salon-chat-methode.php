<?php 

session_start(); 
require_once('../class/Database.php');

if ( isset($_POST['value']) AND !empty($_POST['value'])){

	switch ($_POST['value']) {

		case '1':
			 getChatSalon();
			break;

		case '2':
			 insertChatSalon();
			break;	    			
		
		default:
			# code...
			break;
	}

}else{
	echo " Error";
}



function getChatSalon()
{
    $email = $_SESSION['id'];

    $sqlQuery = "SELECT id_user FROM user WHERE email=:email";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sqlQuery);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    $memberId = $res['id_user'];

       $query = "SELECT chats.*,user.nom,user.id_user
              FROM chats 
               LEFT JOIN user
                 ON chats.id_sender = user.id_user";


        $stmt = Database::getInstance()
              ->getDb()
              ->prepare($query);
            // $stmt->bindParam(":email",$email);
        $stmt->execute();


     $outputMessage = '';
     
   if ($stmt->rowCount() > 0){

      $i = 0;
   
     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    	if($i==0){

           $i=5;

           $first=$row;

           $outputMessage .= '
         <div id="triangle1" class="triangle1"></div>
          <div id="message1" class="message1">
               <span style="color:white;float:right;">
                 '.$row['message'].'
               </span> 
               
               <br/>
               
               <div>
                  <span style="color:black;float:left;font-size:10px;clear:both;">
                   '.$row['nom'].'
                   '.$row['date'].'
                  </span>
               </div>
          </div>
        
          <br/><br/>';



    	}else{
    		if ($row['id_sender'] != $memberId ) {

    			 $outputMessage .= '
         <div id="triangle" class="triangle"></div>
          <div id="message" class="message">
            <span style="color:white;float:left;">
               '.$row['message'].'
            </span> 

            <br/>
         
            <div>
        
               <span style="color:black;float:right; font-size:10px;clear:both;">
                  '.$row['nom'].'
                  '.$row['date'].'
               </span>
        
            </div>
        
          </div>
        
          <br/><br/>';

    			
    		}else{

    			$outputMessage .= '
       <div id="triangle1" class="triangle1"></div>
        <div id="message1" class="message1">
           <span style="color:white;float:right;">
              '.$row['message'].'
           </span> 
            
            <br/>
           
           <div>
              <span style="color:black;float:left;font-size:10px;clear:both;">
                 '.$row['nom'].'
                 '.$row['date'].'
              </span>
          
           </div>
        </div>
     
        <br/><br/>';


    		}
    	}
    }

  }  


echo $outputMessage;

}



function insertChatSalon()
{
  if (isset($_POST['message']) AND isset($_POST['sender_id'])) {
	  if (!empty($_POST['message']) AND  strlen($_POST['message']) > 16 AND !empty($_POST['sender_id'])) {
          // je met la condition >16 parceque dans le js meme quand le text area est vide il me dise que sa longueur est 16

		  $msg = htmlspecialchars($_POST['message']);
	    $date = date('y-m-d h:ia');
	    $sender = $_POST['sender_id'];

	    $sql = "INSERT INTO chats
	          SET id_sender=:sender,message=:msg,date=:dt";

        $stmt = Database::getInstance()
                ->getDb()
                ->prepare($sql);
        $stmt->bindParam(":sender",$sender);
        $stmt->bindParam(":msg",$msg);
        $stmt->bindParam(":dt",$date);
        $stmt->execute();
		
		
	  }
	
  }

  // echo "Ok";
 
}












 ?>