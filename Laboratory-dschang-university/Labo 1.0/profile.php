<?php  
require_once('include/header.php');
require_once('include/navbar.php');

require_once('class/Database.php');


session_start();

if (!$_SESSION['id']) {
   header('location: connexion.php');
}else{
	$email = $_SESSION['id'];
	$sqlQuery = "SELECT * FROM user WHERE email=:email";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sqlQuery);
	$stmt->bindParam(":email", $email);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
}

 ?>



<!-- profile  -->
	 <section class="content">
	 	    <h1 class="title">  Mon Profil</h1>
	 	  	<div class="img">
	 	  		<img src="profile_dir/<?=$res['image'];?>" width="90" height="90" class="img-see">
	 	  	</div>

	 	  	<div class="nom">Nom :<?=$res['nom'];?></div>
	 	  	<div class="prenom">Prenom : <?=$res['prenom'];?></div>
	 	  	<div class="membre">Membre depuis :<?=$res['date'];?></div>
	 	  	<button class="editer"><a href="edit_profil.php" class="">Editer</a></button>
			<button class="post-button"><a href="#publication-block" class="">poster</a></button>
			<button class="all-member"><a href="listemembres.php" class="">Membres</a></button>
			<button class="all-member" onclick="confirmSppression()" style="color: white">Quitter</a></button>


	 </section>

   <!-- publication   -->
	<div class="my-post" style="">

	     <?php
	                    
	       $sqlQuery = "SELECT article.* 
	                     FROM article
	                       WHERE article.id_user_post =:value
	                     ORDER BY article.date DESC";

            $stmt = Database::getInstance()
                     ->getDb()
                     ->prepare($sqlQuery);
            $stmt->bindParam(':value',$res['id_user']);         
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

 

	     ?>
         <h1 class="all-my-pub">liste de mes publications</h1>
          <!-- je copie le code html de la partie publication  -->

     <?php  foreach ($result as $resul): {
 
     } ?>
		 <p id ="prett">
		 	<p class="pret-name">Sender Mr : <font class="color" style="color: #09F;"> <?= $res['nom'];?> </font> &Aacute; <?= $resul['date'];?></p>
		 	<p class="pret-titre">Titre: <?= $resul['titre'];?></p>
		 	<p class="pret-titre">Auteurs: <?= $resul['auteurs'];?></p>
		 	<p class="pret-lien">Lien Vers Le journal :<a href="<?= $resul['lien'];?>"> <?= $resul['lien'];?> </a> </p>
		 	<p class="pret-contenue-post">
		 		<p class="pret-resume">
		 		   <u>Contenue: </u> 

		 		   <br>
		 		   <br> 
		 		   <?= $resul['resume'];?>
		 		</p>
		 		<p class="pret-commenter">
		 			<a  href="commentez.php?article=<?= $resul['id_user_post'];?>">Commentaire</a>
		 		</p>
		 	</p>
	
         </p>
      <?php endforeach; ?>   
         
	</div>

	 <section class="vision" id="vision"  >
	 	<h1>Mon Article</h1>
	 	<div class="pret-publier">
		    <!-- <div class="pret-mail"> Email : <span id="ok-mail"></span></div>  -->
	 		<div class="pret-titre"> Titre : <span id="ok-titre"></span></div>
	 		<div class="pret-lien">Lien Vers Le journal :<a href="" id="ok-lien" blank='true'></a> </div>
	 		<div class="pret-authors"> Auteur : <span id="ok-authors"></span></div>

	 		<div class="pret-resume">
				 <textarea name="resume"  class="In-pret-resume"  id="ok-resume" rows="" cols=""  value=""  placeholder="R&eacute;sum&eacute;"></textarea> 
	 		</div>
	 		<div class="action">
	 			<button class="annuler" id="annuler">Annuler</button>
	 			<button class="publier-definitivement" id="publier-definitivement">Publier</button>
	 		</div>
	 	</div>	
	 </section>



	 <section class="publication-block" id = "publication-block" method="POST">

	 	<form  class="donne">

         <h1 class="head-title">PUBLICATION</h1>
		  
		 <span class="link-error" id="link-error"></span>
		 <div class="user">
         	<input type="text"  id="link" name="link"  placeholder="Lien Vers le Journal">    
		 </div>               
		 
           <div class="user" >
			       <input type="text" name="idee" class=""  id ="id-gen" placeholder="Titre">
           </div>

           <span class="autor-error" id="author-error"></span>
           
           <div class="user">
         	  <input type="text" id="author_pub" name="author" placeholder="Les Auteurs">
           </div>
                        
           <div class="resume">
                   <textarea name="resume"  class="textarea-resume"  id="id-resume" rows="6"  placeholder="R&eacute;sum&eacute;"></textarea>              
            </div>
                       
            <div class="enregistrer">
                 <button class="finish" id="finish"> <a href="#vision">Enregistrer </a></button>
				 <div id="comment-message">Article Added Successfully!</div>
				 <span id="comment-message-error"></span>

            </div>
			
	 	</form>
	 	
	 </section>






<script>
document.querySelector('.post-button').addEventListener('click',function () {		 
  document.querySelector('.vision').style.display = 'block';
  document.querySelector('section.publication-block').style.display = 'block';
});

		  
document.getElementById('finish').addEventListener('click',function verifyData () 
	{    
		document.getElementById('comment-message').style.display='none';  

		link = document.getElementById('link').value;
		titre =document.getElementById('id-gen').value;
		auteur =document.getElementById('author_pub').value;
		resume =document.getElementById('id-resume').value;

		
		
		 var xhttp = new XMLHttpRequest();
		 var url = 'function/actionInProfil.php';


		 xhttp.onreadystatechange = function ()
		 {
			 if (this.readyState == 4 && this.status == 200) {
				var data =  JSON.parse(this.response);
				
				    if (data['statut-lien'] == 1)
					 {  
						document.getElementById('comment-message').style.display='inline-block';
		                document.getElementById('link').value="";
		                document.getElementById('id-gen').value="";
		                document.getElementById('id-resume').value="";
		                document.getElementById('author_pub').value="";
				        				   
     				    showGoodPost(titre,link,resume);

					 }else if(data['champ']){
					 	document.getElementById("comment-message-error").innerHTML = '<font color="red" style="margin-left:0%;">'+data['champ']+ '<font>'; 
					 }else if(data['statut'] == -2){//donc Url invalide
					 	var data =  JSON.parse(this.response);
		                 document.getElementById('comment-message').style.display='none'
		                 document.getElementById("link-error").innerHTML = '<font color="red" style="margin-left:8%;">' +data['lien']+ '<font>'; 
   
					 }else
					 {                  
						alert("errror");
				      }	

			 }else{
			 	 // alert("Failed to add Post !");
				 return false;
			 }
		 }

		 xhttp.open("POST", url, true);
		 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 var execute = 1;
		 var parameters = "link=" +link+  "&idee=" +titre+ "&resume="+resume+ "&value=" + execute;
		 xhttp.send(parameters);


});


function showGoodPost(titre,link,resume,auteur) {	            
                document.getElementById("ok-titre").textContent+=  titre;
                document.getElementById("ok-lien").textContent+= link;
                document.getElementById("ok-lien").href= link;
			    document.getElementById("ok-resume").value = resume;
			    document.getElementById("ok-authors").textContent= this.auteur;
}


document.getElementById('annuler').addEventListener('click',function annuler() {
		        document.getElementById("ok-titre").textContent ="";
                document.getElementById("ok-lien").textContent ="";
                document.getElementById("ok-lien").href ="";
                document.getElementById("ok-resume").value ="";
                document.getElementById("ok-authors").textContent = ""; 
});


document.getElementById('publier-definitivement').addEventListener('click',function publier_def() {
            
		link = document.getElementById('ok-lien').textContent;
		idee_general =document.getElementById('ok-titre').textContent;
		resume =document.getElementById('ok-resume').value;
		auteur =document.getElementById('ok-authors').textContent;

        var xhttp = new XMLHttpRequest();
		var url = 'function/actionInProfil.php';
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {    
				alert(this.response);
		        document.getElementById("ok-titre").textContent ="";
                document.getElementById("ok-lien").textContent ="";
                document.getElementById("ok-lien").href ="";
                document.getElementById("ok-resume").value =""; 
                document.getElementById('ok-authors').textContent="";


			}
        };
		xhttp.open("POST", url, true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var execute = 2;
	    var parameters = "lien=" +link+  "&titre=" +titre+ "&resume="+resume+ "&auteur="+auteur+ "&value=" + execute;
		xhttp.send(parameters);

});



function confirmSppression() {
	// body...
	var resul = confirm("la suppression de votre compte est irreversible .voulez vous vraiment supprimer votre comtpe? si oui appuiyez sur OK ");

	if (resul) {
		// je creais une requete XMLHttpRequest
		var xhttp = new XMLHttpRequest();
		var url = 'function/actionInProfil.php';
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {   
                if (this.response == 1) { 
                	// alors je supprime sont compte et je le redirige a l'index
				   document.location.href = 'index.php';
			    }
			}
        };
		xhttp.open("POST", url, true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var execute = 4;
	    var parameters = "value=" + execute + "&identifiant=" + <?=$res['id_user'];?>;
		xhttp.send(parameters);


	} 
}
	
	
</script>

	 





<?php  require_once('include/footer.php') ?>/ 