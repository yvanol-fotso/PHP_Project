<?php  
require_once('include/header.php'); 
require_once('include/navbar.php');
require_once('class/Database.php');
require_once('class/paginator.php');


?>


<head>

  <style type="text/css">

    /*style the paginator block*/
        #pageElement{
          text-align: center;
          margin-bottom: 5%;
        }
        /*style the paginator block*/

    .videotheq-container{
         display: flex;
         width: 95%;
          background: rgb(0,12%,3%,1%);
         box-shadow: 1px 1px 5px 5px gray;
         border-radius: 20px;
         margin: 3%;
         flex-wrap: wrap;
         justify-content: center;
    }

    .videotheq-container .stories-video{
      margin: 1.4%;
    }

    .stories-video-title{
      text-align: center;
      margin-top: 15%;
      color: #4e4949;
    }
    .this-storie-info{
      background: #242222;
      color:  white;
      font-size: 20px;
      border-radius: 15px;
      width: 255px;

      margin-bottom: 2%;
      border-bottom: 5px solid white;
    }

    .this-storie-info p{
      padding: 6px;
    }

    
  @media only screen and (max-width: 980px) {
    .stories-video-title{
      margin-top: 30%;
      
    }
    
  }
      
  @media only screen and (max-width: 568px) {
    .stories-video-title{
      margin-top: 30%;
      
    }
      
  }
      
  @media only screen and (max-width: 480px) {
    .videotheq-container .stories-video video{
      margin: 1.4%;
      width:96%;
    }

    .stories-video-title{
      margin-top: 30%;
      
    }
      
  }
      
  @media only screen and (max-width: 360px) {
    .videotheq-container .stories-video video{
      margin: 1.4%;
      width:96%;
    }
    .stories-video-title{
      margin-top: 40%;
      
    }
      
     
  }
      
  @media only screen and (max-width: 320px) {
    .videotheq-container .stories-video video{
      margin: 1.4%;
      width:95%;

      margin-bottom: 2%;
      border-bottom: 5px solid white;
      margin-top: 2%;
      border-top: 5px solid white;
    }

    .stories-video-title{
      margin-top: 40%;
      
    }


  
  }

    
  </style>

</head>
<body>

    <h1 class="stories-video-title"><u>VIDEOS DES TRAVAUX </u></h1>


	<div class="videotheq-container" id="videotheq-container">
  <?php 
  
  $path = 'admin/';

   $pages = new Paginator('1','p');

   $query1 = "SELECT id_vid FROM video ORDER BY date DESC"; 

   $stmt1 = Database::getInstance()
            ->getDb()
            ->prepare($query1);
   $stmt1->execute();

   //pass number of records to
   $pages->set_total($stmt1->rowCount());

   

   $query = "SELECT * FROM video ORDER BY date DESC " .$pages->get_limit();;

   $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
   $stmt->execute();

    if ($stmt->rowCount() > 0){

     
      $container = '';

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
         $container .= '

          <div class="stories-video">
             <video poster="movie.jpeg" controls width="250" > 
               <source src=" '.$path.'/'.$row['video'].' " type="video/mp4; codecs="avc1.4D401E, mp4a.40.2" ">  
                 <p>Votre navigateur ne prend pas en charge l\'élément <code>video</code>. 
                 </p> 
             </video> 

             <div class="this-storie-info">
                <p class="storie-vid-descrip">'.$row['description'].'</p> 
                <p class="storie-vid-time">'.$row['date'].'</p>      
             </div>

          </div>';
      }

      echo $container;


    }else{
      echo "<font style='margin-left:0%;' color=green><b><i> AUCUNE VIDEO </font>";
    }

    ?>
  
  </div>

  <div id="pageElement">      
   <?php  echo $pages->page_links(); ?>
  </div>

</body>


<?php  
require_once('include/footer.php'); 
?>
