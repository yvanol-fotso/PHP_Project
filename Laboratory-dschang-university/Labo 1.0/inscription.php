<?php  
require_once('include/header.php'); 
require_once('include/navbar.php');

require_once('function/Register.php');


  if(isset($_POST['btn'])){
      
      $errors =  verify();

      // si la variable $errors est un entier  ou un string exple "10" alors l'insertion/ajout a reussi ;si c'est un array()/tableau alors
      //il y'a la presence des erreurs

      $type = gettype($errors);

      if(is_string($type)){
        header('Location:connexion.php');           
      }elseif(is_int($type)){
        header('Location:connexion.php');           
      }else{
        var_dump($errors);
        
      }

  }
?>
  

	<br><br><br>

  <div class="box-insc">

  <form action="" method="POST" enctype="multipart/form-data" style="margin-bottom: 10px;">		
			<div class=" panel ">
          <div id="header">
            <h1 id="logintoregister">S'inscrire</h1>
          </div> 
  
          <div class="group">      
            <input class="inputMaterial" type="text" name="nom" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label> 
              <?php if (!empty($errors['nom'])) {
                echo '<font color="red">'.$errors['nom']. '</font>';
              }else
                echo "Nom";
              ?>
            </label>
          </div>

          <div class="group">      
            <input class="inputMaterial" type="text" name="prenom" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>
            <?php 
              if (!empty($errors['prenom'])) {
                echo '<font color="red">' .$errors['prenom'].'</font>';
              }else
                echo "Prénom";
              ?>
            </label>
            </label>
          </div>
     
          <div class="group">      
            <input class="inputMaterial" type="email" name="email" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>
             <?php 
              if (!empty($errors['email'])) {
                echo '<font color="red">'.$errors['email'].'</font>';
              }else
                echo "Email";
              ?>
            </label>
          </div>

	        <div class="group">      
            <input class="inputMaterial" type="password" name="password" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>
             <?php 
              if (!empty($errors['password'])) {
                echo '<font color="red">'.$errors['password'].'</font>';
              }else
                echo "Mot de passe";
              ?>
            </label>
          </div>

           <div class="group">      
            <input class="inputMaterial" type="password" name="password_two" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>
             <?php 
              if (!empty($errors['password'])) {
                echo '<font color="red">' .$errors['password']. '</font>';
              }else
                echo "Repeter Mot de passe";
              ?>
            </label>
            </label>
          </div>


          <div class="group">
            <label>
             <?php 
              if (!empty($errors['file'])) {
                echo '<font color="red">'.$errors['file'].'</font>';;
              }else
                echo "Votre Image";
              ?>
            </label>          
            <br><br>
            <input value="Voter image" class="" type="file" name="image"   required>          
          </div>

          <button name="btn"   type="submit">Enregister</button>
      </div>   
  </form>  
  
   <div id="footer-box" ><p class="footer-text"><a href="connexion.php"><span class="sign-up" > Se connecter</span></a></p></div>
 </div>

 


 

<?php 
 
    // var_dump($errors);
    
  require_once('include/footer.php') ;
  
?>