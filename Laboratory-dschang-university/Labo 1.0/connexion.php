<?php  
Session_start();

require_once('include/header.php') ;
require_once('include/navbar.php'); 

require_once('function/Register.php');


   if(isset($_POST['btnc'])){
      $errors =  connexionOk();

       // si la variable $errors est un entier  ou un string exple "10" alors l'insertion/ajout a reussi ;si c'est un array()/tableau alors
      //il y'a la presence des erreurs

      $type = gettype($errors);
 
      if(gettype($errors) == 'integer'){
        header('Location:profile.php');               
      }else if(is_int($type)){
        header('Location:profile.php');               
      }else if (is_integer($type)){
        header('Location:profile.php');               
      }else{
        echo $type;
      }  
 
   }

?>
    
	    <br><br><br>	
		
			<div class="login-panel panel panel-default">
				<div class="box" style="height: 420px;">
					
               <div id="header">
                 <h1 id="logintoregister">Se Connecter</h1>
               </div> 
               
               <form enctype="multipart/form-data" method="POST">
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
                 <button name="btnc"  id="buttonlogintoregister" type="submit">Connexion</button>
               </form>
         <div id="footer-box" ><p class="footer-text"><a href="forgortpassword.php"><span class="sign-up" >Mot de passe oublier? </span></a> / <a href="inscription.php"><span class="sign-up" > S'inscrire</span></a></p></div>
      </div>




<?php 
  
// var_dump($errors);
// echo $type;

require_once('include/footer.php') 

?>

