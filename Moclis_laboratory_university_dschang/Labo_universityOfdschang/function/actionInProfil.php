<?php 
session_start(); 
require_once('../class/Database.php');


if ( isset($_POST['value']) AND !empty($_POST['value'])){

	switch ($_POST['value']) {

		case '1':
			 verification();
			break;

		case '2':
			 addPost();
			break;

		case '3':
			 postTraitement();
			break; 

		default:
			# code...
			break;
	}

}else{
	echo " Error";
}


// Publication depuis le profile

function verification()
{
	$errors = array();

// ici je dois verifier si l'email  et lien vers la publication respecte les expression reguliere 
// egale use htmlspecialize pour epure les autre champ

if (isset($_POST['link']) && isset($_POST['idee']) && isset($_POST['resume'])){

	if (!empty($_POST['link']) && !empty($_POST['idee']) && !empty($_POST['resume']) ) {
        $link =  $_POST['link'];
        $idee = $_POST['idee'];
        $resume = $_POST['resume'];
    
         if(filter_var($link,FILTER_VALIDATE_URL)) {               
             $errors['statut-lien'] = 1;
          }else{
             $errors['lien'] = 'Url non Valide';
             $errors['statut'] = -2;
          }
      
  }else{
  	$errors['champ'] = 'Un ou Plusieurs Champs Sont Vide';
  }

}

echo json_encode($errors);

} 


 // ajout ou insertion du post en BD apres verification

function addPost()
{
	
  if (isset($_POST['lien']) AND isset($_POST['titre']) AND isset($_POST['resume']) AND isset($_POST['auteur']) ) {
	

  $errors = array();
  $email =  $_SESSION['id'];
  $link = $_POST['lien'];
  $title = $_POST['titre'];
  $comment = $_POST['resume'];
  $auteurs = $_POST['auteur'];
  

  if(!empty($email) AND !empty($link) AND !empty($title) AND !empty($comment)){

    $sqlQuery = "SELECT * FROM user WHERE email=:email";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sqlQuery);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    $val = $res['id_user'];

    $sql = "INSERT INTO article
            SET
             titre=:title, lien=:link, resume=:resume, id_user_post=:val ,auteurs=:author";
    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":link", $link);
    $stmt->bindParam(":resume", $comment);                           
    $stmt->bindParam(":val", $val);                           
    $stmt->bindParam(":author",$auteurs);                           
    $stmt->execute();

  }


}else{
	// on n;executera jamais notre else car on ne publie definitivement lorsqon a verifier et tout est ok
	echo "Echec verifier votre Email ou Votre Lien";
}

}


// fin des publication depuis le profile




// ici la fonction de traitement des champ "si ok alors insert en BD sinon back les error "

function postTraitement()
{

	// ici je dois verifier si l'email  et lien vers la publication respecte les expression reguliere 
    // egale use htmlspecialize pour epure les autre champ

 if (isset($_POST['lien']) AND isset($_POST['titre']) AND isset($_POST['article']) AND isset($_POST['auteur']) ) {
	
   if (!empty($_POST['lien']) AND !empty($_POST['titre']) AND !empty($_POST['article']) ) {
  

        $errors = array();
        $email = $_SESSION['id'];
        $link = $_POST['lien'];
        $title = $_POST['titre'];
        $comment = $_POST['article'];

        $auteurs = $_POST['auteur'];

        if(filter_var($link,FILTER_VALIDATE_URL)) {               
          //  $errors['lien'] = 'Url Valide';
          // $errors['statut-lien'] = 1;
        }else{
         $errors['lien'] = 'Url non Valide';
         $errors['statut-lien'] = -2;
        }


       if (count($errors)==0) {   
       

          $sqlQuery = "SELECT * FROM user WHERE email=:email";

          $stmt = Database::getInstance()
                 ->getDb()
                 ->prepare($sqlQuery);
          $stmt->bindParam(":email", $email);
          $stmt->execute();
          $res = $stmt->fetch(PDO::FETCH_ASSOC);

          $val = $res['id_user'];

          $sql = "INSERT INTO article
                  SET
                    titre=:title, lien=:link, resume=:resume, id_user_post=:val,auteurs=:author";
          $stmt = Database::getInstance()
                   ->getDb()
                   ->prepare($sql);
          $stmt->bindParam(":title", $title);
          $stmt->bindParam(":link", $link);
          $stmt->bindParam(":resume", $comment);                           
          $stmt->bindParam(":val", $val); 
          $stmt->bindParam(":author",$auteurs);                                   
          $stmt->execute();
       }else{
        echo json_encode($errors);
       }   

       
   }else{
     $errors['champ'] = 'Un ou Plusieurs Champs Sont Vide';    
   }

}

echo json_encode($errors);

}




 ?>