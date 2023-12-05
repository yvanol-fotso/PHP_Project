<?php 
  include 'include/header.php'; 
  include 'Class/Database/Database.php';
 ?>


<head>
	<title>delete_video</title>
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
		.delete_video{
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

    video{
      width: 60px;
      height: 60px;
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

      if(isset($_GET['id_vid'])){
      
        $id = $_GET['id_vid'];

        $sql = "DELETE  FROM video WHERE id_vid=:id";


        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo "Suppression Ok!!";
      }
 

   ?>

    <h2> Supprimer Une Video</h2>
     <button class="back"><a href="home.php">Back To Admin Space</a></button>


      <?php  

     $sql = "SELECT * FROM video";


        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
   ?>


<?php foreach ($res as $value): ?>
	<div class="delete_video">
    
          <video poster="" controls width="250" > 
               <source src="<?=$value['video'];?>" type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"'>  
                 <p>Votre navigateur ne prend pas en charge l'élément <code>video</code>. 
                 </p> 
          </video> 

       
          <span class="delete-video_name">Nom Video: <?=$value['description'];?></span>
          <span class="delete-video_date">Date: <?=$value['date'];?></span>
          <span class="delete-option"><a href="?id_vid=<?=$value['id_vid'];?>" class="">DELELTE</a></span>
      
	</div>


<?php endforeach; ?>


<?php include 'include/footer.php'; ?>
