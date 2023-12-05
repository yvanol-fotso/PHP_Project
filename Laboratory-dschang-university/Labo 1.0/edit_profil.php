<?php  

require_once('include/header.php');
require_once('include/navbar.php'); 


require_once('function/Register.php');

?>

<?php 
  if (isset($_POST['change'])) {

  	$errors = verifyNewProfil();
    if ($errors['succes'] == "Succeffully Udapte Information For Your") {
  	    header('location:profile.php');
    }else{
  		//on t'afiche les erreurs : 
    }
         
  }

 ?>


  <section class="profil_edition">
       <div class="new-profil">

       	   <span class="alert-succes" id="change-succesful"></span>
       	    <!-- avec la balise <form> la page se recharge absolument ce aue je ne veux pass -->

           <form action="" enctype="multipart/form-data" method="POST" id="frmEdition" >
			 <div id="form-Edition-title" class="form-Edition-row">Editer Votre Profile</div>

			<div class="form-Edition-row">
				<div class="form-Edition-label">Entrer Votre Email:</div><div class="error" id="subject"></div>
				<div class="form-Edition-element">
					<input type="email"  name="usermailValue" id="usermailValue">
					<span class="error-email">
						 <?php  if (!empty($errors['email'])) {
                                echo '<font color="red">'.$errors['email'].'</font>';
                               }else if(!empty($errors['notExist'])){
                                echo '<font color="red">'.$errors['notExist'].'</font>';
                               }
                         ?>


					</span>
				</div>
			</div>

			<div class="form-Edition-row">
				<div class="form-Edition-label">Nouveau Nom:</div><div class="error" id="subject"></div>
				<div class="form-Edition-element">
					<input type="text"  name="new-name" id="new-name">
					<span class="error-nom">
						 <?php if (!empty($errors['nom'])) {
                                  echo '<font color="red">'.$errors['nom']. '</font>';
                               }
                         ?>
					</span>
				</div>
			</div>

            <div class="form-Edition-row">
				<div class="form-Edition-label">Nouveau Prenom:</div><div class="error" id="subject"></div>
				<div class="form-Edition-element">
					<input type="text"  name="new-prenom" id="new-prenom">
					<span class="error-prenom">
						
                         <?php 
                           if (!empty($errors['prenom'])) {
                               echo '<font color="red">' .$errors['prenom'].'</font>';
                           }
                         ?>
					</span>
				</div>
			</div>

			<div class="form-Edition-row">
				<div class="form-Edition-label">Votre Image:</div><div class="error" id="comment"></div>
				<div class="form-Edition-element">
                    <input type="file" name="avatar" id="avatar">
					<span class="error-avatar">
						 <?php 
                            if (!empty($errors['file'])) {
                                echo '<font color="red">'.$errors['file'].'</font>';;
                            }
                            ?>
					</span>
				</div>
			</div>

			<div class="form-Edition-row">
				<div class="form-Edition-element">
					<button type="submit" name="change" id="btn-Edition-send">Valider</button>
                </div>
			</div>

		</form>
        
       </div>

  </section>

  


<?php  
// var_dump($errors);
require_once('include/footer.php');
?>