<?php  
 session_start();

 require_once('include/header.php');
 require_once('include/navbar.php'); 

 require_once('class/Paginator.php');
 require_once('class/Database.php');



 if (!$_SESSION['id']) {
   header('location: connexion.php');
 }
?>


	<section class="listing-pub" id="ouput_article">


		  <?php 
		     $pages = new Paginator('2','p');

             $query1 = "SELECT id_arti FROM article ORDER BY date DESC"; 

             $stmt1 = Database::getInstance()
                    ->getDb()
                    ->prepare($query1);
             $stmt1->execute();

             //pass number of records to
             $pages->set_total($stmt1->rowCount()); 


             $sqlQuery = "SELECT * FROM article a
                      INNER JOIN  user u 
                      WHERE u.id_user =  a.id_user_post
                      ORDER BY a.date DESC ".$pages->get_limit();

             $stmt = Database::getInstance()
                   ->getDb()
                   ->prepare($sqlQuery);
             $stmt->execute();

             if ($stmt->rowCount() > 0) {
   
              $outputString = '';
  
             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
                 // foreach($stmt as $row): 
  
                 // foreach begin sont parcour a 2 

                 $outputString.= '
                   <div class="listing-article">
                       <div class="header-person">
                          <p class="person-name" id="person-name">Publication De Mr :<font class="color" style="color: #09F;">' .$row['nom'].' </font> at ' .$row['date'].' </p>
                          <p class="person-titre" id="person-titre">Titre:' .$row['titre']. '</p>
                          <p class="person-titre" id="person-titre">Auteurs:' .$row['auteurs']. '</p>
                          <div class="person-lien" >Lien Vers Le journal :<a href=" '.$row['lien'].' " class="lien-journal" id="lien-journal"> '.$row['lien'].' </a> </div>
                       </div>
  
                       <div class="person-post">
                          <p class="person-content-post"><u>Contenue: </u></p>
                          <div  name="" class="pub-person-content" id="pub-person-content" > '.$row['resume'].' </div>
        
                          <button class="read-post"><a  href="commentez.php?article=' .$row['id_arti']. ' " class="read-more-post">Commentaire</a></button>
                       </div>
  
      
                   </div>';

                  // endforeach;
               }

                echo $outputString;


             }else{
                echo '<p style = "text-align:center;"><font style="margin-left:0%;" color=green><b><i> VIDE </font></p>';
                

             }


           ?>  

    </section>

    <!-- paginaion evenement passe -->
    <div id="pageElement">      
          <?php  echo $pages->page_links(); ?>
    </div> 
    <!-- fin pagination  -->




	<section class="add-pub">
	 <div class="add-pub-container">
        <h1>Publier Un Article</h1>

        <form>
          <!-- <span id = "add-pub-email-span"></span>   -->
          <!-- <input type="email" name="mail"  class="mail" id="mail" placeholder="Email" required="" />   -->
          <input type="text" name="titre"  class="titre" id="titre" placeholder="Titre"  required="" />
		      <span id = "add-pub-link-span"></span> 
		      <input type="text"  name="lien" class="lien" id="lien" placeholder="Lien Vers Le Journal Ex:https://facebook.com"  required="" />
		      <input type="text"  name="author_member" class="lien" id="auteur_post" placeholder="Les Auteurs"  required="" />
		      <textarea
            name="article"
            id="article"
            cols="30"
            rows="10"
            class="article"
            required=""
            placeholder="Your Publication"
           ></textarea>

          <button id="submitPub" class="add-pub-send">Send</button> 
		      <div id="comment-message">Article Added Successfully!</div>
		      <span class="error-field" id="error-field"></span>
		       <div id="comment-message2">Failled to Add Article!</div>

        </form>
        
    </div>
	</section>

  
<script>

		  
document.getElementById('submitPub').addEventListener('click',function addArticle () 
	{    
		document.getElementById('comment-message').style.display='none';   
		var link = document.getElementById('lien').value;
		var titre =document.getElementById('titre').value;
		var place =document.getElementById('article').value;
		var auteurpost =document.getElementById('auteur_post').value;
		
		 var xhttp = new XMLHttpRequest();
		 var url = 'function/actionInProfil.php';


		 xhttp.onreadystatechange = function ()
		 {
			 if (this.readyState == 4 && this.status == 200) {
			 	var data =  JSON.parse(this.response);
				    if (!this.response)
					 {  
     					document.getElementById('comment-message').style.display='inline-block';
		                document.getElementById('lien').value="";
		                document.getElementById('titre').value="";
		                document.getElementById('article').value="";

				    }else if(data['champ']){

                      document.getElementById('error-field').innerHTML = '<font color="red" style="margin-left:0%;">' +data['champ']+ '<font>';

					 }else if(data['lien'])
					 {   document.getElementById('comment-message2').style.display='inline-block';
		                 document.getElementById('comment-message').style.display='none' 
                         document.getElementById("add-pub-link-span").innerHTML = '<font color="red" style="margin-left:4%;">' +data['lien']+ '<font>';
						 
				     }else{
				     	// alert("error");
						 return false;
				     }
				 // alert(this.response);

			 }else{
				    // alert("Code status is not not Ok ");
				   return false;
		      }

		 }

		 xhttp.open("POST", url, true);
         // xhttp. responseType ="json";
		 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 var execute = 3;
		 let parameters = "lien=" +link+ "&titre=" +titre+ "&article= " +place+ "&auteur= " +auteurpost+ "&value=" +execute;
		 xhttp.send(parameters);


});



</script>

	 
<?php  require_once('include/footer.php') ?>	
