<?php  
  include 'include/header.php';
  include 'Class/Database/Database.php';

 ?>


<head>
	<title>delete_user</title>
  <link rel="icon" type="image/jpg" href="asset/img/LOGO.jpg" />
	<style type="text/css">

		h2{
			font-size: 25px;
			color: green;
			margin: 5%;
			text-align: center;
		}
		.back{
			margin:1% 0% 0% 8%;
			padding: 1%;
		}
		.delete_user{
		 width: 80%;
     margin: 1% 5% 1% 8%;
		 padding: 2%;
     background: #607d8b;
     color: white;
	   display: flex;
	   flex-wrap: wrap;
	   justify-content: space-around;
	   align-items: center;
		}


        
   .delete_user_img,.delete-name,.delete-email,.delete-option{
       	

    }

    .delete-option{
      text-decoration: none;
    	display: inline-block;
    	background: #009688;
    	color: white;
    	border:none;
    	padding: 1%;
    	border-radius: 15px;
    }

   .delete-option a{
      text-decoration: none;
    	display: inline-block;
    	background: #009688;
    	color: white;
    	border:none;
      padding: 2%;
       
    }	

	</style>
</head>
<body>



     <?php 

      if(isset($_GET['id_user'])){
      
        $id = $_GET['id_user'];

        $sql = "DELETE FROM user WHERE id_user=:id";


        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo "Suppression Ok!!";
      }
 
     ?>

    <h2> Supprimer Un Compte d'un User</h2>
     <button class="back"><a href="home.php">Back To Admin Space</a></button>



      <?php  

        $sql = "SELECT * FROM user ORDER BY date DESC";


        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        

      ?>


<?php foreach ($res as $value): ?>
    


	<div class="delete_user">
          <img class="delete_user_img" src="../profile_dir/<?=$value['image'];?>" width="40">
          <span class="delete-name">Nom:<?=$value['nom'];?> </span>
          <span class="delete-email">Email: <?=$value['email'];?></span>
          <span class="delete-option"><a href="?id_user=<?=$value['id_user'];?>" class="">DELELTE</a></span>
	</div>


<?php endforeach; ?>





<?php include 'include/footer.php'; ?>
