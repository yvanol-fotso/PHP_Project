<?php  
require_once('include/header.php');
require_once('include/navbar.php');
require_once('class/Database.php');
require_once('class/Paginator.php');

?>


  <div id="even_container">
  	<h1>Ev&egrave;nements pass&eacute;s</h1>
  	 
				<div class="even_row" id="evenPasse">
            <?php 

               $pages = new Paginator('4','p');

               $query1 = "SELECT id_even FROM evenement_pass ORDER BY date DESC"; 

               $stmt1 = Database::getInstance()
                        ->getDb()
                        ->prepare($query1);
               $stmt1->execute();

               //pass number of records to
               $pages->set_total($stmt1->rowCount());            

               $query = "SELECT image,nom,description,date_format(date, '%Y/%m/%d') AS date FROM evenement_pass ORDER BY date DESC " .$pages->get_limit();

               $stmt = Database::getInstance()
                        ->getDb()
                        ->prepare($query);
               $stmt->execute();

                
              if ($stmt->rowCount() > 0){

                  $path = 'admin/';
     
                  $container = '';

                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                     $container .= '

                         <div class="even_col">
                            <img src=" '.$path.'/'.$row['image'].' ">
                            <p> '.$row['nom'].' </p>
                            <p> '.$row['date'].' | Lieu</p>
                            <p> '.$row['description'].' </p>
                        </div>';
                  }

                  echo $container;

                }else{
                  echo "<font style='margin-left:40%;font-size: 12px;' color=green><b><i> AUCUN EVENEMENT PASS&Eacute; </font>";

                }

             ?>
		
		    </div>
		    	
		</div>

    

    <!-- paginaion evenement passe -->
    <div id="pageElement">      
             <?php  echo $pages->page_links(); ?>
    </div> 
    <!-- fin pagination  -->

		


    <div id="even_container">
			<h1>Ev&egrave;nements &aacute; venir</h1>

				<div class="even_row" id="evenVenir">

          <?php 

               $pages = new Paginator('4','q');

               $current_date = date('Y-m-d h:m:s');

               // $sqlQuery = "SELECT * FROM evenement_futur WHERE date >= :date_courrante";
               $sqlQuery = "SELECT image,nom,description,date_format(date, '%Y/%m/%d') AS date FROM evenement_pass ORDER BY date DESC";

               $stmt1 = Database::getInstance()
                       ->getDb()
                       ->prepare($sqlQuery);
               // $stmt1->bindParam(":date_courrante",$current_date);
               $stmt1->execute();           

               //pass number of records to
               $pages->set_total($stmt1->rowCount());            

              $query = "SELECT image,nom,description,date_format(date, '%Y/%m/%d') AS date FROM evenement_futur ORDER BY date DESC " .$pages->get_limit();;

                $stmt = Database::getInstance()
                        ->getDb()
                        ->prepare($query);
                $stmt->execute();

                
                if ($stmt->rowCount() > 0){
                  $path = 'admin/';
     
                  $container = '';

                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                     $container .= '

                         <div class="even_col">
                            <img src=" '.$path.'/'.$row['image'].' ">
                            <p> '.$row['nom'].' </p>
                            <p> '.$row['date'].' | Lieu</p>
                            <p> '.$row['description'].' </p>
                        </div>';
                  }

                  echo $container;

                }else{
                  echo "<font style='margin-left:10%;font-size: 12px;' color=green><b><i> AUCUN EVENEMENT &Aacute; VENIR </font>";

                } 
           ?>

		    </div>
		    
		</div>

    <!-- paginaion evenement passe -->
    <div id="pageElement">      
             <?php  echo $pages->page_links(); ?>
    </div> 
    <!-- fin pagination  -->


 <?php  require_once('include/footer.php') ?>