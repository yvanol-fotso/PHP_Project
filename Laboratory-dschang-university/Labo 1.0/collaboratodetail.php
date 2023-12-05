<?php  
require_once('include/header.php');
require_once('include/navbar.php');
require_once('class/Database.php');


?>

<head>
	<title>Collaborateur Detail</title>
	<style type="text/css">
     .collab-detail{
      margin-top: 10%;
      margin-bottom: 10%;
      padding: 4%;
      align-items: center;
      text-align: center;
      width: 80%;
      background: #e0dfdf;
      margin-left: 10%;

     }
     .collab-detail .here-img{
       width: 150px;
       height: 150px;
       border-radius: 75px;
       text-align: center;
       margin: 2%;
     }
     .collab-detail .collab-name{
       margin: 2%;

     }

     .collab-detail .collab-duree{
       margin: 2%;
       
     } 

     .collab-detail .back-another{
       margin: 2%;
       padding: 10px;
       border-radius: 10px;
       background: black;
       
     } 

     .collab-detail .collaback{
       text-decoration: none;
       color: white;

     } 

     /*media queries*/
        @media only screen and (max-width: 980px) {
        .collab-detail{
          margin-top: 20%;
          margin-bottom: 10%;
          padding: 4%;
          align-items: center;
          text-align: center;
          width: 80%;
          background: #e0dfdf;
          margin-left: 10%;

        }
        .collab-detail .here-img{
          width: 80px;
          height: 80px;
          border-radius: 45px;
          text-align: center;
          margin: 2%;
        }
        .collab-detail .collab-name{
          margin: 4%;
        }
        .collab-detail .collab-duree{
          margin: 4%;
        } 
      }
       @media only screen and (max-width: 568px) {
        .collab-detail{
          margin-top: 30%;
          margin-bottom: 10%;
          padding: 4%;
          align-items: center;
          text-align: center;
          width: 80%;
          background: #e0dfdf;
          margin-left: 10%;

        }
        .collab-detail .here-img{
          width: 80px;
          height: 80px;
          border-radius: 45px;
          text-align: center;
          margin: 2%;
        }
        .collab-detail .collab-name{
          margin: 4%;
        }
        .collab-detail .collab-duree{
          margin: 4%;
        } 
      }
       @media only screen and (max-width: 480px) {
        .collab-detail{
          margin-top: 40%;
          margin-bottom: 10%;
          padding: 4%;
          align-items: center;
          text-align: center;
          width: 80%;
          background: #e0dfdf;
          margin-left: 10%;

        }
        .collab-detail .here-img{
          width: 80px;
          height: 80px;
          border-radius: 45px;
          text-align: center;
          margin: 2%;
        }
        .collab-detail .collab-name{
          margin: 4%;
        }
        .collab-detail .collab-duree{
          margin: 4%;
        } 
      }
       @media only screen and (max-width: 320px) {
        .collab-detail{
          margin-top: 40%;
          margin-bottom: 10%;
          padding: 4%;
          align-items: center;
          text-align: center;
          width: 80%;
          background: #e0dfdf;
          margin-left: 10%;

        }
        .collab-detail .here-img{
          width: 80px;
          height: 80px;
          border-radius: 45px;
          text-align: center;
          margin: 2%;
        }
        .collab-detail .collab-name{
          margin: 4%;
        }
        .collab-detail .collab-duree{
          margin: 4%;
        } 
      }

      @media only screen and (max-width: 360px) {
        .collab-detail{
          margin-top: 40%;
          margin-bottom: 10%;
          padding: 4%;
          align-items: center;
          text-align: center;
          width: 80%;
          background: #e0dfdf;
          margin-left: 10%;

        }
        .collab-detail .here-img{
          width: 80px;
          height: 80px;
          border-radius: 45px;
          text-align: center;
          margin: 2%;
        }
        .collab-detail .collab-name{
          margin: 4%;
        }
        .collab-detail .collab-duree{
          margin: 4%;
        } 
      }

		
	</style>
</head>

<body>

   <div class="collab-detail">

   	 <?php 

     if (isset($_GET['detail']) AND !empty($_GET['detail'])) {

        $id = $_GET['detail'];
        $sql =" SELECT image,nom,description,date_format(date, '%Y/%m/%d') AS date FROM partenaire_collaborator WHERE  id_part = $id";
        $stmt = Database::getInstance()
                  ->getDb()
                  ->prepare($sql);
        $stmt->execute();
        $row =  $stmt->fetch(PDO::FETCH_ASSOC);

     }

     $path = 'admin/';

    ?>

    <!-- je construis la reponse a injecter dans la vu -->

      <div class="detail-member-collab">
      	 <img class="here-img" src="<?=$path.'/'.$row['image'];?>">
      	 <div class="text-info-collab">
          <p class="collab-name">Nom : <?=$row['nom'];?></p>     
      	 	<p class="decription-member"><i><?=$row['description'];?></i></p>
      	 	<p class="collab-duree">Collaborateur Depuis : <?=$row['date'];?></p>
      	 	<button class="back-another"><a href="collaborateurs.php" class="collaback">Retour</a></button>
      	 </div>
      </div>


   </div>	
</body>


<?php  require_once('include/footer.php') ?>
