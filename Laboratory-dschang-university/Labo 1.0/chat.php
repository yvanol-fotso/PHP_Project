<?php 
require_once('include/header.php') ;
require_once('include/navbar.php');
require_once('class/Database.php');


session_start();

?>



  <div class="wrapp-chat">
    <section class="chat-area">
      <header>

        <?php

          $user_id = htmlspecialchars(strip_tags($_GET['user_id']));

          $sql = "SELECT * FROM user 
                   WHERE id_user=:user_id";
          $stmt = Database::getInstance()
                  ->getDb()
                  ->prepare($sql);
          $stmt->bindParam(":user_id",$user_id);
          $stmt->execute();
          
          if($stmt-> rowCount() > 0){
            $row  = $stmt->fetch(PDO::FETCH_ASSOC);
          }else{
            header("location:listemembres.php");
          }
        ?>

        <a href="listemembres.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="profile_dir/<?php echo $row['image']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['nom']. " " . $row['prenom'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>


      <div class="chat-box">

      </div>

      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button class="buttonSend"><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  

<?php  require_once('include/footer.php'); ?>
