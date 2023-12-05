
<?php 
  include 'include/header.php';
  include 'Class/Database/Database.php';
  Session_start();

?>


<head>
      <link rel="icon" type="image/jpg" href="asset/img/LOGO.jpg" />
	    <link rel="stylesheet" href="asset/css/style_connexion.css" />
</head>

<body>


<?php  
   if(isset($_POST['btnc'])){
      if (!empty($_POST['email']) AND !empty($_POST['password'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE email=:email AND  password =:password";


        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC); 
        if ($stmt->rowCount() > 0 ) {
           $_SESSION['username'] = $res['username'];
           header('Location:home.php');               
           
        }else{
          echo "Echec De  Connexion";
        }
      }
 
   }

?>
    
      <br><br><br>  
      <h2 style="text-align: center;"><font color="green"> <u> Bienvenue Sur Votre Espace Admin!!</font> </u></h2>
    
      <div class="login-panel panel panel-default">
        <div class="box" style="height: 420px;">
          
               <div id="header">
                 <h1 id="logintoregister">Connexion Admin</h1>
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



<?php include 'include/footer.php'; ?>
