<?php  
require_once('include/header.php');
require_once('include/navbar.php');
require_once('class/Database.php');
require_once('class/paginator.php');


 $path_image = 'admin/upload/gallery';
?>
 
<head>
	<style type="text/css">
		/*style the paginator block*/
        #pageElement{
        	text-align: center;
        	margin-bottom: 5%;
        }
        /*style the paginator block*/
         #show_gall{
        	display:  flex;
        	width: 90%;
	       margin: 6% 10% 5% 5%;
	       padding: 3% 0 3% 3%;
	       box-shadow: 1px 1px 5px 5px gray;
	       border-radius: 20px;
        }
        .our-gallery-stories{
            margin-top:10%;
            padding:2%;
            color:gray;
            font-size:25px;
            text-align:center;

        }

		.our-gallery{
	       margin:1%;
	       border: none;
		}

		.our-gallery img.our-img{
			width: 200px;
			height: 200px;
			border-radius: 5px;
		}

		/*media queries*/

        @media only screen and (max-width: 980px) {

         #show_gall{
          
           display: grid;
           grid-template-columns: repeat(auto-fit, minmax(120px, auto));
           width: 90%;
	       margin: 20% 10% 5% 5%;
	       padding: 3% 0 3% 3%;
	       box-shadow: 1px 1px 5px 5px gray;
	       border-radius: 20px;
         }

         .our-gallery img.our-img{
			width: 90px;
			height: 110px;
		  }
          .our-gallery  img.our-img{
			width: 100px;
			height: 100px;
		  }
          .our-gallery{
		   width: 90%;
	       margin: 15% 10% 5% 5%;

		  }
         .our-gallery-stories{
            margin-top:20%;

          }
        }

        @media only screen and (max-width: 720px) {
         #show_gall{
           /*display:  flex;*/
           /*flex-wrap: wrap;*/
           display: grid;
          grid-template-columns: repeat(auto-fit, minmax(120px, auto));
           width: 90%;
	       margin: 20% 10% 5% 5%;
	       padding: 3% 0 3% 3%;
	       box-shadow: 1px 1px 5px 5px gray;
	       border-radius: 20px;
         }

         .our-gallery img.our-img{
			width: 90px;
			height: 110px;
		  }
           .our-gallery{
		   width: 90%;
	       margin: 15% 10% 5% 5%;

		 }
         .our-gallery-stories{
            margin-top:25%;
 
        }
    }
    
        @media only screen and (max-width: 568px) {

         #show_gall{
           display: grid;
           grid-template-columns: repeat(auto-fit, minmax(100px, auto));
           width: 90%;
	       margin: 20% 10% 5% 5%;
	       padding: 3% 0 3% 3%;
	       box-shadow: 1px 1px 5px 5px gray;
	       border-radius: 20px;
         }
           .our-gallery img.our-img{
			width: 90px;
			height: 110px;
		  }
          .our-gallery{
		   width: 100%;
	       margin: 20% 10% 5% 5%;

		 }
         .our-gallery-stories{
            margin-top:20%; 

          }
        }
    
        @media only screen and (max-width: 480px) {
         #show_gall{
           display: grid;
           grid-template-columns: repeat(auto-fit, minmax(100px, auto));
           width: 90%;
	       margin: 20% 10% 5% 5%;
	       padding: 3% 0 3% 3%;
	       box-shadow: 1px 1px 5px 5px gray;
	       border-radius: 20px;
        }
           .our-gallery img.our-img{
			width: 80px;
			height: 90px;
		 }
         .our-gallery{
		   width: 90%;
	       margin: 20% 10% 5% 5%;

		 }
          .our-gallery-stories{
            margin-top:35%;

         }
        }
    
        @media only screen and (max-width: 360px) {
        #show_gall{
           display: grid;
           grid-template-columns: repeat(auto-fit, minmax(100px, auto));
           width: 90%;
	       margin: 20% 10% 5% 5%;
	       padding: 3% 0 3% 3%;
	       box-shadow: 1px 1px 5px 5px gray;
	       border-radius: 20px;
        }
          .our-gallery img.our-img{
			width: 60px;
			height: 60px;
		 }
         .our-gallery{
		   width: 90%;
	       margin: 20% 10% 5% 5%;

		 }
         .our-gallery-stories{
            margin-top:40%;

         }
   
        }
    
        @media only screen and (max-width: 320px) {

         #show_gall{
           display: grid;
           grid-template-columns: repeat(auto-fit, minmax(100px, auto));
           width: 90%;
	       margin: 20% 10% 5% 5%;
	       padding: 3% 0 3% 3%;
	       box-shadow: 1px 1px 5px 5px gray;
	       border-radius: 20px;
        }
         .our-gallery img.our-img{
			width: 80px;
			height: 90px;
		  }
		  .our-gallery{
		  	margin:5%;
		  }

         .our-gallery-stories{
            margin-top:40%;
         }

        }
    
    
	</style>	
</head>

  <h1 class="our-gallery-stories"><u>NOS IMAGES / TRAVAUX</u></h1>	

 <div id="show_gall">
 	
 <?php 
   $path = 'admin/';
    
   $pages = new Paginator('5','p');

   $query1 = "SELECT id_img FROM gallery ORDER BY date DESC"; 

   $stmt1 = Database::getInstance()
            ->getDb()
            ->prepare($query1);
   $stmt1->execute();

   //pass number of records to
   $pages->set_total($stmt1->rowCount());
  
  


    $query = "SELECT * FROM gallery ORDER BY date DESC " .$pages->get_limit();

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0){
   
      $container = '';

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
         // $container .= '
      	echo '
           <div class="our-gallery  our-gallery_'.$row['id_img'].' ">    
             <img src=" '.$path.'/'.$row['image'].' " class="our-img  our-img_'.$row['id_img'].' " alt="" onclick="seemore('.$row['id_img'].')" onmouseover="change('.$row['id_img'].')" onmouseout="trans('.$row['id_img'].')">
             <div class="our-img-description  our-img-description_'.$row['id_img'].'  "  id ="our-img_id" style="display: none;">
              <p class="text-img-descr"> '.$row['description'].' </p>
              <p class="date-img-desc" style="margin-left: 10px">'.$row['date'].'</p>
             </div>
          </div>';
      }

    }else{
    	 echo "<font style='margin-left:40%;' color=green><b><i> LA GALLERY EST VIDE </font>";
    }

 ?>

 </div>
   
 
 <div id="pageElement">      
   <?php  echo $pages->page_links(); ?>
 </div>
 

<script type="text/javascript">
  // var image = document.getElementsByClassName('our-img');

	function seemore(n) {
		var image = document.querySelector('img.our-img_'+n);

		if(!image.classList.contains('plein')){
		     image.style.width='75%';
	     	 // image[n].style.height='500px';
	     	 image.style.margin='10% 0% 10% 10%';
	     	 document.querySelector('.our-img-description_'+n).style.display='inline-block';
	     	 
	     	 var winWidth  =  window.innerWidth;

	     	  if ( winWidth > 770) {
	     	  	var marg = '-20% 0% 0% 10%';
	     	  	var val = '75%';
	     	    image.style.height='800px';

	     	  } else if( (winWidth < 770) && (winWidth > 592) ) {
	     	  	var marg = '-8% 0% 5% 10%';
	     	  	var val = '75%';
	     	    image.style.height='500px';

	     	  }else if( (winWidth < 592) && (winWidth > 392)) {
                var marg = '-8% 0% 5% 10%';
	     	  	var val = '75%';
	     	    image.style.height='450px';

	     	  }else if((winWidth <  392) && (winWidth >292)) {
                var marg = '-8% 0% 5% 8%';
	     	  	var val = '75%';
	     	    image.style.height='200px';

	     	  }else if((winWidth <  292) && (winWidth > 192)) {
                var marg = '-8% 0% 5% 8%';
	     	  	var val = '75%';
	     	    image.style.height='300px';

	     	  }
		
		     // je cache les autres images lorsque une est ouverte
		     var tab = document.querySelectorAll('.our-gallery')
		      for (var i = 0 ; i < tab.length ; i++) {
		      	 if (!tab[i].classList.contains('our-gallery_'+n)) 
		      	 	tab[i].style.display = 'none';
		      }
		      

	     	 document.querySelector('.our-img-description_'+n).style.margin=marg;
	     	 document.querySelector('.our-img-description_'+n).style.heigth= '100px';
	     	 document.querySelector('.our-img-description_'+n).style.width= '80%';
	     	 document.querySelector('.our-img-description_'+n).style.border='1px solid #8989ad';
	     	 document.querySelector('.our-img-description_'+n).style.fontSize='20px';
	     	 document.querySelector('.our-img-description_'+n).style.borderRadius='20px';
	     	 document.querySelector('.our-img-description_'+n).style.boxShadow=' 0px 3px 13px 3px blue';
	     	 document.querySelector('.our-img-description_'+n +'>*').style.padding='20px';

		     image.classList.add('plein');
		}else{
			// je recupere la taille de l'ecran actuel avec une fonction js et je fait les test conditionnel
			//suivant la valeur recuperer a comparer avec les tailles specifier dans les medias queries
			var largeur = window.offsetWidth > '992px' ? '200px' : '';
			var largeur = window.offsetWidth > '592px' ? '90px' : '';
			var largeur = window.offsetWidth > '592px' ? '90px' : '';
			var largeur =window.offsetWidth > '392px' ? '60px' : '';

			image.style.width= largeur;
	 	    image.style.height= largeur;
	     	image.style.margin='0%';
	     	document.querySelector('.our-img-description_'+n).style.display='none';
	     	document.querySelector('.our-img-description_'+n).style.margin='0px';
	     	document.querySelector('.our-img-description_'+n).style.border='none';
	     	document.querySelector('.our-img-description_'+n).style.fontSize='0px';
	     	document.querySelector('.our-img-description_'+n).style.borderRadius='0px';
            
		     // je fait voir les autres images lorsque l'on a fermer celle qui etait ouverte
	     	var tab = document.querySelectorAll('.our-gallery')
		      for (var i = 0 ; i < tab.length ; i++) {
		      	 if (!tab[i].classList.contains('our-gallery_'+n)) 
		      	 	tab[i].style.display = 'block';
		      }
            
		    image.classList.remove('plein');
		}
	}

	function change(e){
		document.querySelector('img.our-img_'+e).style.transform = 'scale(1.02)';
	}

	function trans(e){
		document.querySelector('img.our-img_'+e).style.transform = 'scale(1)';
	}

</script>



<?php  require_once('include/footer.php') ?>