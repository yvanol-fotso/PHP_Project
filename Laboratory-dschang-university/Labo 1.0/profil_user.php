<?php  
require_once('include/header.php');
require_once('include/navbar.php');
require_once('class/Database.php');

?>

<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT nom ,prenom,image, date_format(date, '%Y/%m/%d') AS date  FROM user WHERE id_user= :id";
        $stmt = Database::getInstance()
               ->getDb()
               ->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }
?>

      <section class="content">
	 	    <h1 class="title">  Mon Profil</h1>
	 	  	<div class="img">
	 	  		<img src="profile_dir/<?=$row['image'];?>" width="90" height="90" class="img-see">
	 	  	</div>
	 	  	<div class="nom">Nom : <?=$row['nom'];?> </div>
	 	  	<div class="prenom">Prenom : <?=$row['prenom'];?> </div>
	 	  	<div class="membre">Membre depuis : <?=$row['date'];?> </div>
			<button class="all-member"><a href="chat.php" class="">Chat</a></button>
	 </section>

     <!-- publication   -->
	 

     <div class="my-post" style="">

         <?php

           $sqlQuery = "SELECT * FROM article a
                        INNER JOIN  user u 
                        WHERE u.id_user =  a.id_user_post
                        ORDER BY a.date DESC";

            $stmt = Database::getInstance()
                     ->getDb()
                     ->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->fetchAll();

 

         ?>
         <h1 class="all-my-pub">liste de mes publications</h1>
          <!-- je copie le code html de la partie publication  -->

     <?php  foreach ($result as $resul): {
 
     } ?>
         <p id ="prett">
            <p class="pret-name">Sender Mr : <?= $resul['nom'];?>  &Aacute; <?= $resul['date'];?></p>
            <p class="pret-titre">Titre: <?= $resul['titre'];?></p>
            <p class="pret-lien">Lien Vers Le journal :<a href="<?= $resul['lien'];?>"> <?= $resul['lien'];?> </a> </p>
            <p class="pret-contenue-post">
                <p class="pret-resume">
                   <u>Contenue: </u> <br>
                   <?= $resul['resume'];?>
                </p>
                <p class="pret-commenter">
                    <a  href="commentez.php?article=<?= $resul['id_user_post'];?>">Commentaire</a>
                </p>
            </p>
    
         </p>
      <?php endforeach; ?>   
         
    </div>


<?php  require_once('include/footer.php') ?>