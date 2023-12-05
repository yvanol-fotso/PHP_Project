<?php 
require_once('../class/Database.php');
session_start();


if ( isset($_POST['value']) AND !empty($_POST['value'])){

	switch ($_POST['value']) {

		case '1':
			 comment_add();
			break;

		case '2':
			 comment_list();
			break;

		case '3':
			 get_like_unlike();
			break;

		case '4':
			 comment_like_unlike();
			break;			    			
		
		default:
			# code...
			break;
	}

}else{
	echo " Error";
}


function comment_add()
{
	# code...

    if ( isset($_POST['comment_id']) AND isset($_POST['comment']) AND isset($_POST['name']) AND isset($_POST['article'])) {
	
     $commentId = $_POST['comment_id'];
     $comment = htmlspecialchars(strip_tags($_POST['comment']));
     $commentSenderName = $_POST['name'];
     $id_art = $_POST['article'];

     // je peux egalement use ma var session
     // $email =  $_SESSION['id'];
     }

   if(filter_var($commentSenderName,FILTER_VALIDATE_EMAIL)){    

      if (!empty($commentSenderName) AND !empty($comment)) {
	
	  
	    $sqlQuery = "SELECT * FROM user WHERE email=:email";

        $stmt = Database::getInstance()
               ->getDb()
               ->prepare($sqlQuery);
        $stmt->bindParam(":email", $commentSenderName);
        $stmt->execute();

        if ($stmt->rowCount() > 0 ) {

          $res = $stmt->fetch(PDO::FETCH_ASSOC);

          $nom = $res['nom'].' '.$res['prenom'];
       

          $sql = "INSERT INTO tbl_comment
                   SET
                   arti_id=:arti_id,parent_comment_id=:parent_comment_id, comment=:comment, comment_sender_name=:comment_sender_name";
          $stmt = Database::getInstance()
                  ->getDb()
                  ->prepare($sql);

          $stmt->bindParam(":arti_id",$id_art);
          $stmt->bindParam(":parent_comment_id", $commentId);
          $stmt->bindParam(":comment", $comment);                           
          $stmt->bindParam(":comment_sender_name",$nom);                           
          $stmt->execute();
          $stmt->fetch();
   
        }else{
         echo "Email Not Correct";
       }

     }else{
        echo "Email Not Correct";
     }  

   }else{
    echo "Email Not Correct";
   } 

}



function comment_list()
{
	
	$Id_article = $_POST['post_id'];// c'est pour eviter des lourde requete ou jointure que je poste directemmnt l'id de l'article pour en faire une clause where

    $email = $_SESSION['id'];
    $sqlQuery = "SELECT * FROM user WHERE email=:email";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sqlQuery);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    $memberId = $res['id_user'];


    $sql = "SELECT tbl_comment.* ,tbl_like_unlike.like_unlike 
             FROM tbl_comment

              LEFT JOIN tbl_like_unlike
               ON tbl_comment.comment_id = tbl_like_unlike.comment_id 
               AND member_id =:member_id 

            WHERE arti_id =:article_id
           ORDER BY parent_comment_id asc, comment_id asc";


    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
    $stmt->bindParam(":article_id",$Id_article);
    $stmt->bindParam(":member_id",$memberId);
    $stmt->execute();

    $record_set = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
        array_push($record_set, $row);
    }

    echo json_encode($record_set);
}



function get_like_unlike()
{
	# code...
	$commentId = $_POST['comment_id'];
    $totalLikes = "No ";
    $likeQuery = "SELECT sum(like_unlike) AS likesCount FROM tbl_like_unlike WHERE comment_id=:comment_id";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($likeQuery);
    $stmt->bindParam(":comment_id", $commentId);
    $stmt->execute();

    $fetchLikes = $stmt->fetch(PDO::FETCH_ASSOC);


    if(isset($fetchLikes['likesCount'])) {
       $totalLikes = $fetchLikes['likesCount'];
    }

    echo $totalLikes;
}





function comment_like_unlike()
{
	# code...
	  $email = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE email=:email";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    $memberId = $res['id_user'];

    $commentId = $_POST['comment_id'];

    $likeOrUnlike = 0;

    if($_POST['like_unlike'] == 1)
    {
   $likeOrUnlike = $_POST['like_unlike'];
    }

    $sql = "SELECT * 
        FROM tbl_like_unlike
        WHERE comment_id=:comment_id AND member_id=:member_id";


    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
    $stmt->bindParam(":comment_id", $commentId );
    $stmt->bindParam(":member_id", $memberId);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($row)) 
    {
       $sql= "UPDATE tbl_like_unlike 
              SET like_unlike =:like_unlike 
              WHERE  comment_id=:comment_id AND member_id=:member_id";   
    }else{
      $sql = "INSERT INTO tbl_like_unlike
            SET
             member_id=:member_id,comment_id=:comment_id, like_unlike=:like_unlike"; 
    }

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
    $stmt->bindParam(":member_id", $memberId );
    $stmt->bindParam(":comment_id", $commentId);
    $stmt->bindParam(":like_unlike", $likeOrUnlike);                                                
    $stmt->execute();




    $totalLikes = "No ";
    $likeQuery = "SELECT sum(like_unlike) AS likesCount FROM tbl_like_unlike WHERE comment_id=:comment_id";
    
    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($likeQuery);
    $stmt->bindParam(":comment_id", $commentId);                                              
    $stmt->execute();

    $fetchLikes = $stmt->fetch(PDO::FETCH_ASSOC);

    if(isset($fetchLikes['likesCount'])) {
       $totalLikes = $fetchLikes['likesCount'];
    }

   echo $totalLikes;


}







 ?>