<?php
session_start(); 
require_once('../class/Database.php');



if ( isset($_POST['value']) AND !empty($_POST['value'])){

	switch ($_POST['value']) {

		case '1':
			 showGaleryIndex();
			break;

		case '2':
			 evenPassIndex();
			break;
			
		case '3':
			 evenComeIndex();
			break;
			
		case '4':
			 listAllMemberAndChat();
			break;	

		case '5':
			 getPartenaire();
			break;	

		case '6':
		    listCollaborator();
		    break;

		case '7':
		    getPartenaireUniversity();
		    break;	 
    case '8':
        contactAdmin();
        break;

    case '9':
        loadMessageAdmin();
        break;  

    case '10':
        loadPartenaire();
        break;               			
		
		default:
			# code...
			break;
	}

}else{
	echo " Error";
}





function showGaleryIndex()
{
	# code...
  $path = 'admin/';

	$query = "SELECT id_img,image FROM gallery ORDER BY date DESC LIMIT 8";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->execute();

    $container = '';

    if ($stmt->rowCount() > 0){

       while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
         $container .= '
             <img src=" '.$path.'/'.$row['image'].'" class="gallery_item  gallery_item_'.$row['id_img'].' " > ';
      }

    }

  
  if (empty($container)) {
    echo "<font style='margin-left:40%;' color=green><b><i> LA GALLERY EST VIDE </font>";
  }else{
   echo $container;
  }

}


// Notons que ici ne supporte que les fonction qui n'on pqas de parametre dans l'url

function evenPassIndex()
{
   $path = 'admin/';


   $query = "SELECT image,nom,description,date_format(date, '%Y/%m/%d') AS date FROM evenement_pass ORDER BY date DESC LIMIT 4";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0){

     
      $container = '';

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
         $container .= '
             <div class="even_col">
                <img src=" '.$path.'/'.$row['image'].' ">
                <p> '.$row['nom'].' </p>
                <p> '.$row['date'].' </p>
                <p> '.$row['description'].' </p>
            </div>';
      }

    }

  
  if (empty($container)) {
    echo "<font style='margin-left:40%;' color=green><b><i> AUCUN EVENEMENT PASS&Eacute; </font>";
  }else{
   echo $container;

  }
}





function evenComeIndex(){
   // $path = 'admin/';


   $query = "SELECT image,nom,description,date_format(date, '%Y/%m/%d') AS date FROM evenement_futur ORDER BY date DESC LIMIT 4";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0){
    	$path = 'admin/';

     
      $container = '';

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){

      	  $container .='<div class="even_col">
                            <img src=" '.$path.'/'.$row['image'].' ">
                            <p> '.$row['nom'].' </p>
                            <p> '.$row['date'].'</p>
                            <p> '.$row['description'].' </p>
                        </div>';
      }

    }

  
  if (empty($container)) {
    echo "<font color=green><b><i> AUCUN EV&Egrave;NEMENT A VENIR  </font>";
  }else{
   echo $container;

  }

}


// partie qui liste les membres et leurs conversation


function listAllMemberAndChat()
{

  // je recupere l'id du user courant
    $email = $_SESSION['id'];
    
    $query = "SELECT id_user FROM user WHERE email =:email";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    if ($stmt->rowCount() > 0){

      $res = $stmt->fetch(PDO::FETCH_ASSOC);
      $outgoing_id = $res['id_user'];
    }


  // les informations des autres users

    $email = $_SESSION['id'];
    
    $outputString ='';

    $sql = "SELECT id_user,nom,status,image,date_format(date, '%Y/%m/%d') AS date FROM user WHERE NOT email =:email ORDER BY id_user DESC";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        $outputString .= "No users are available to chat";
    }elseif($stmt->rowCount() > 0) {
      
    	while($row = $stmt->fetch(PDO::FETCH_ASSOC) ){

        $unique_id = $row['id_user'];

        $sql2 = "SELECT * FROM messages 
                 WHERE (incoming_msg_id =:incoming_id OR outgoing_msg_id =:outgoing_id ) AND (outgoing_msg_id =:outgoing_id OR incoming_msg_id =:incoming_id) 
                 ORDER BY msg_id DESC LIMIT 1";
        $stmt = Database::getInstance()
                 ->getDb()
                 ->prepare($sql2);
        $stmt->bindParam(":incoming_id", $unique_id);
        $stmt->bindParam(":outgoing_id", $unique_id);
        $stmt->bindParam(":outgoing_id", $outgoing_id);
        $stmt->bindParam(":incoming_id", $outgoing_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $res = $stmt->fetch(PDO::FETCH_ASSOC); 
            $result = $res['msg'];
        }else{
            $result ="No message available";
        }

        // ($res->rowCount() > 0) ? $result = $res['msg'] : $result ="No message available";    
        // (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $resul;

        if (strlen($result) > 28) {
            $msg =  substr($result, 0, 28) . '...';
        }else{
            $msg = $result;
        }



        if(isset($res['outgoing_msg_id'])){
            ($outgoing_id == $res['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }


        ($row['status'] == "Non Actif") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['id_user']) ? $hid_me = "hide" : $hid_me = "";


        $outputString .=' 
          <div class="menber-one">
              <a href="profil_user.php?id='.$row['id_user'].' ">
                <img class="menber-img" src="profile_dir/'.$row['image'].' ">
              </a>
              
              <div class="other-info">
                  <span class="menber-name">Nom: '.$row['nom'].' </span>
                  <span class="menber-date">D&eacute;puis: ' .$row['date'].' </span>
                  <span class="menber-status">status: ' .$offline.' </span>
                  <a href="chat.php?user_id='.$row['id_user'].' " class="menber-chat-href">
                     <span class="menber-chat">Chattez Avec</span>
                  </a>
              </div>
              
              <p class="menber-message"><font color="green">'. $you . $msg .'</font></p>

          </div>';        
    }
    }


 echo $outputString ;

}




// partie des partenaire de la pages evenComeIndex
 
 function getPartenaire()
 {
 	  $path = 'admin/';

 
    $query = "SELECT id_part, image ,lien FROM partenaire_university ORDER BY date DESC LIMIT 6";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->execute();

     $container = '';

    if ($stmt->rowCount() > 0){

       while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
         $container .= '
            <a href=" '.$row['lien'].' " target="_blank" > 
               <img src=" '.$path.'/'.$row['image'].' " class="gallery_item  gallery_item_'.$row['id_part'].' " > 
            </a>';
      }

    }

  
  if (empty($container)) {
    echo "<font style='margin-left:40%;' color=green><b><i> NOT UNIVERSITY</font>";
  }else{
   echo $container;
  }
 }


// partie partenaire: collaborateur

 function listCollaborator()
 {
   $path = 'admin/';


   $query = "SELECT id_part,image,description ,date_format(date, '%Y/%m/%d') AS date FROM partenaire_collaborator ORDER BY date DESC";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0){

     
      $container = '';

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
         $coupe = substr($row['description'],0,80)." ...";
         $container .= '

          <div class="collaborateur_description">
             <img class="collaborateur_img"src=" '.$path.'/'.$row['image'].'  " />
             <div class="collaborateur_info">
               <p class="collaborateur_link"> <a href="collaboratodetail.php?detail='.$row['id_part'].' "> Detail </a> </p>
               <p class="collaborateur_duree">Depuis :' .$row['date'].' </p>
             </div>
             <div class="collaborateur_domaine"><i> '.$coupe.' </i></div>
         </div>';
      }

    }

  
  if (empty($container)) {
    echo "<font style='margin-left:40%;' color=green><b><i> AUCUN PARTENAIRE </font>";
  }else{
   echo $container;

  }

 }



 function getPartenaireUniversity()
 {
   $path = 'admin/';


   $query = "SELECT image,lien,date_format(date, '%Y/%m/%d') AS date FROM partenaire_university ORDER BY date DESC";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0){

     
      $container = '';

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
         $container .= '

          <div class="partern-content-descrip">
             <img class="partern-image-descrip"src=" '.$path.'/'.$row['image'].'  " />
             <div>
               <p class="partern-link-descrip"> <a href="'.$row['lien'].'" target ="_blank"> site internet </a> </p>
               <p class="partern-duree-descrip">Depuis :' .$row['date'].' </p>
             </div>
         </div>';
      }

    }

  
  if (empty($container)) {
    echo "<font style='margin-left:40%;' color=green><b><i> NOT UNIVERSITY </font>";
  }else{
   echo $container;

  }

 }



 function contactAdmin()
 {
   # code...


  if (isset($_POST['email']) AND isset($_POST['nom']) AND isset($_POST['message']) AND !empty($_POST['email']) AND !empty($_POST['nom']) AND !empty($_POST['message']) ) {
  
        
        $errors = array();

        // $email_de_la_session = $_SESSION['id'];

        $email = $_POST['email'];
        $nom =  htmlspecialchars(strip_tags( $_POST['nom']));
        $message = htmlspecialchars(strip_tags($_POST['message']));


        if(filter_var($email,FILTER_VALIDATE_EMAIL)) {               
      
            $sqlQuery = "INSERT INTO contatc_us
                         SET  nom=:nom, email_sender=:email,message=:message";

            $stmt = Database::getInstance()
                    ->getDb()
                    ->prepare($sqlQuery);
            $stmt->bindParam(":nom", $nom);       
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":message", $message);
            $stmt->execute();

            $errors['succes'] = 1;
          
         }else{        
          $errors['succes'] = -1;
         }

   }else{
      $errors['succes'] = -1;  
   }

  echo json_encode($errors);
 }




 function loadMessageAdmin(){

   $sqlQuery = "SELECT * FROM contatc_us ORDER BY date DESC";
          
   $stmt = Database::getInstance()
           ->getDb()
           ->prepare($sqlQuery);
   $stmt->execute();


   $outputString = '';
  
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

      $outputString.= '
       <div class="listing_meco">

          <div class="header_sender">

            <p class="sender_name" id="sender_name">Message De Mr :<font class="color" style="color: #09F;">' .$row['nom'].' </font> at ' .$row['date'].' </p>
            <p class="sender_email" id="sender_email">Email : ' .$row['email_sender']. '</p>
            <div  class="sender_meco" id="" > Message'.$row['message'].' </div>

            <button class="sender_delete"><a  href="?id_mess=' .$row['id']. ' " class="">Delete</a></button>
          </div>
  
      
       </div>';
    }

    // puisque le js de l'autre code/contact_us use l'evenement onload il va toujours charger ce resultat avant mon titre et lien de retour car s'execute au loading du  body 

     $title = '<h2> Contact_us : Messages Send By User</h2>
         <button class="back"> <a href="home.php" class="back">Back To Admin Space</a></button>';


     // echo json_encode($title.$outputString);
     echo $title.$outputString;
 }




 // chargement des partenaire carousel page index


  function loadPartenaire(){

    $path = 'admin/';

 
    $query = "SELECT id_part, image ,lien FROM partenaire_university ORDER BY date DESC LIMIT 6";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->execute();

     $container = '';

    if ($stmt->rowCount() > 0){

       while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
         $container .= '
            <a href=" '.$row['lien'].' " target="_blank"> 
               <img src=" '.$path.'/'.$row['image'].' " class="gallery_item  gallery_item_'.$row['id_part'].' " > 
            </a>';
      }

    }

  
  if (empty($container)) {
    echo "<font style='margin-left:40%;' color=green><b><i> NOT UNIVERSITY</font>";
  }else{
   echo $container;
  }


  }




 ?>