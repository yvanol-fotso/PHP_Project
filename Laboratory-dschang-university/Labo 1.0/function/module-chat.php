<?php 

session_start(); 
require_once('../class/Database.php');

if ( isset($_POST['value']) AND !empty($_POST['value'])){

	switch ($_POST['value']) {

		case '1':
			 insertChat();
			break;

		case '2':
			 getChat();
			break;	    			
		
		default:
			# code...
			break;
	}

}else{
	echo "erro";
}





function listUserNotCurrentUser()
{
    $outgoing_id = $_SESSION['id'];

    $sql = "SELECT * FROM user WHERE NOT email =:email ORDER BY id_user DESC";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
    $stmt->bindParam(":email",$outgoing_id);
    $stmt->execute();
    // $res = $stmt->fetch(PDO::FETCH_ASSOC);

    $output = "";
    
    if ($stmt->rowCount() == 0 ) {
        $output .= "No users are available to chat";

    }elseif ($stmt->rowCount() > 0 ) {
         include_once "data.php";
    }

    echo $output;	
}	

// fonction pour inserer les messages


function insertChat()
{
    if(isset($_SESSION['id'])){

        $email = $_SESSION['id'];
        $sql = "SELECT id_user FROM user WHERE email =:email ORDER BY id_user DESC";

        $stmt = Database::getInstance()
                ->getDb()
                ->prepare($sql);
        $stmt->bindParam(":email",$email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          $res = $stmt->fetch(PDO::FETCH_ASSOC);
      
        }
    
        $outgoing_id = $res['id_user'];
        
        $incoming_id = htmlspecialchars(strip_tags($_POST['incoming_id']));
        $message = htmlspecialchars(strip_tags($_POST['message']));

            $sql = "INSERT INTO messages
                    SET
                     incoming_msg_id=:incoming_msg_id, outgoing_msg_id=:outgoing_msg_id, msg=:msg";

            $stmt = Database::getInstance()
                     ->getDb()
                     ->prepare($sql);
            $stmt->bindParam(":incoming_msg_id", $incoming_id);
            $stmt->bindParam(":outgoing_msg_id", $outgoing_id);
            $stmt->bindParam(":msg", $message);                                                   
            $stmt->execute();
            
    }else{
        header("location: ../connexion.php");
    }
}


function getChat()
{
	if(isset($_SESSION['id'])){

        $email = $_SESSION['id'];
        $sql1 = "SELECT id_user FROM user WHERE  email =:email ORDER BY id_user DESC";

        $stmt = Database::getInstance()
                ->getDb()
                ->prepare($sql1);
        $stmt->bindParam(":email",$email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          $res = $stmt->fetch(PDO::FETCH_ASSOC);
      
        }

    
        $outgoing_id = $res['id_user'];

        $incoming_id = htmlspecialchars(strip_tags($_POST['incoming_id']));

        
        $output = "";

        $sql = "SELECT * FROM messages 
                LEFT JOIN user ON user.id_user = messages.outgoing_msg_id
                WHERE (outgoing_msg_id =:outgoing_id AND incoming_msg_id =:incoming_id)
                OR (outgoing_msg_id =:incoming_id AND incoming_msg_id =:outgoing_id) ORDER BY msg_id";

        $stmt = Database::getInstance()
                 ->getDb()
                 ->prepare($sql);
        $stmt->bindParam(":outgoing_id",$outgoing_id);
        $stmt->bindParam(":incoming_id",$incoming_id);
        $stmt->bindParam(":incoming_id",$incoming_id);
        $stmt->bindParam(":outgoing_id",$outgoing_id);
        $stmt->execute();

        
        if($stmt->rowCount() >0 ){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
                if($row['outgoing_msg_id'] == $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="profile_dir/'.$row['image'].'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }

        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }

        echo $output;

    }else{
        header("location: ../connexion.php");
    }

}













 ?>