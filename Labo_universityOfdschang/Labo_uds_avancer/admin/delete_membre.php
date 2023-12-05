<?php 
  include 'include/header.php'; 
  include 'Class/Database/Database.php';
 ?>
 

 
<head>
	<title>delete membre</title>
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
		.delete_Partenaire{
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

      if(isset($_GET['id_part'])){
      
        $id = $_GET['id_part'];

        $sql = "DELETE  FROM membre WHERE id_part=:id";


        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo "Suppression Ok!!";
      }
 

   ?>

    <h2> Supprimer Un Membre</h2>
     <button class="back"><a href="home.php">Back To Admin Space</a></button>


      <?php  

        $sql = "SELECT * FROM membre";


        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
     ?>


<?php foreach ($res as $value): ?>

	<div class="delete_Partenaire">
          <img class="delete_partenaire_" src="<?=$value['image'];?>" width="80">
          <span class="delete-partenaire_name">lien: <a href="<?=$value['lien'];?> "><?=$value['lien'];?> </a></span>
          <span class="delete-partenaire_date">Date: <?=$value['date'];?> </span>
          <span class="delete-option"><a href="?id_part=<?=$value['id_part'];?>" class="">DELELTE</a></span>
      
	</div>


<?php endforeach; ?>


<?php include 'include/footer.php'; ?>
