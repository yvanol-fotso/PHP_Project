<?php  

require_once('include/header.php');
require_once('include/navbar.php');
require_once('I18n/function.inc.php');

 ?>


<div class="slider-container">

<div class="slider">

<div class="slides">

<div id="slides__1" class="slide">

	<span class="slide_text_content">
	   <div class="slide_text_information">
         <h2> <?php  echo $slider1_titre; ?> </h2>
         <a href="gallery.php" class="button"><?php echo $slider1_button1; ?></a>  
         <a href="videotheque.php" class="button"> <?php echo $slider1_button2; ?></a> 

      </div>
	</span>
    
    <a class="slide__prev" href="#slides__4" title="Next"></a>
    <a class="slide__next" href="#slides__2" title="Next"></a>
</div>

<div id="slides__2" class="slide">
     <span class="slide_text_content">
	   <div class="slide_text_information">
         <h2> <?php  echo $slider2_titre; ?> </h2>
         <a href="Evenement.php" class="button"><?php  echo $slider2_button1; ?></a>  
         <a href="partenaire.php" class="button"><?php  echo $slider2_button2; ?></a> 

      </div>
	</span> 
    <a class="slide__prev" href="#slides__1" title="Prev"></a>
    <a class="slide__next" href="#slides__3" title="Next"></a>
</div>

<div id="slides__3" class="slide">
     <span class="slide_text_content">
	   <div class="slide_text_information">
         <h2> <?php  echo $slider3_titre; ?> </h2>
         <a href="espacepublication.php" class="button"><?php echo  $slider3_button1; ?></a>  
         <a href="listemembres.php" class="button"><?php  echo  $slider3_button2; ?></a> 

      </div>
	</span>
    <a class="slide__prev" href="#slides__2" title="Prev"></a>
    <a class="slide__next" href="#slides__4" title="Next"></a>
</div>

<div id="slides__4" class="slide">
     <span class="slide_text_content">
	   <div class="slide_text_information">
         <h2> <?php  echo $slider4_titre; ?></h2>
         <a href="inscription.php" class="button"><?php  echo $slider4_button1; ?></a>  
         <a href="connexion.php" class="button"><?php  echo $slider4_button2; ?></a> 

      </div>
	</span>
    <a class="slide__prev" href="#slides__3" title="Prev"></a>
    <a class="slide__next" href="#slides__1" title="Prev"></a>
</div>

</div>
</div>
</div>




   <div class="slider__nav">
      <a class="slider__navlink" href="#slides__1"></a>
      <a class="slider__navlink" href="#slides__2"></a>
      <a class="slider__navlink" href="#slides__3"></a>
      <a class="slider__navlink" href="#slides__4"></a>

    </div>
<!-- partial -->
  


    <p class="welcome"><u> <?php  echo $welcome; ?> </u> </p>    
    <!-- block presentattion enlever -->

    <!-- End of the header -->
    <div class="module-1" style="margin-top:5%; ">

      <div class="mot-chef">
        <p class="titre"> <?php echo $module1_motchef_titre1; ?><span style="color:darkgoldenrod"><?php  echo $module1_motchef_titre2; ?></span></p>
        <p class="contenu"> 
           <?php  echo $module1_motchef_contenue; ?>
        </p>
        <p class="profil">
          <img src="static/images/profil.jpg" alt="">
          <span class="etoile">
            <img src="static/images/star-etoile-vote/star.png" alt="">
            <img src="static/images/star-etoile-vote/star.png" alt="">
            <img src="static/images/star-etoile-vote/star.png" alt="">
            <img src="static/images/star-etoile-vote/star.png" alt="">
            <img src="static/images/star-etoile-vote/star.png" alt="">
          </span>
        </p>
      </div>

      <div class="domaine-rech">
       <p class="titre"><?php echo $module1_domainerech_titre1; ?><span style="color:darkgoldenrod"><?php echo $module1_domainerech_titre2; ?></span></p>
       <span class="items">+ SYSTEME COMPLEXE</span>
       <span class="items">+ COMPLEXE SYSTEM</span>   
       <span class="items">+ VISION PAR ORDINATEUR</span>   
       <span class="items">+ AUTOMATIQUE</span>   

      </div>

    </div>

 <!-- block evenement  -->

 <!-- evenement passe -->
    <div id="even_container_pass">
  	  <h2><?php echo $event_passe_titre; ?></h2>
			<div class="even_row" id="inputEventPass">
					

			 </div>
		</div>

    <!-- evenement a venir -->

    <div id="even_container_come">
  	  <h2><?php echo $event_avenir_titre; ?></h2>
			<div class="even_row" id="inputEventCome">

			 </div>
		</div>
<!-- fin block evenement -->


    <!-- block gallery -->

    <div id="gallery_container" style="margin-top: 5%;">
      <h2><?php  echo $gallery_titre; ?></h2>
      <!-- <p>Images d&eacute;crivant nos travaux</p> -->

      <div id="gallery_wrapper">
      <div id="gallery_carousel">
        <div id="gallery_content">
           
        </div>
      </div>
      <button id="gallery_prev">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
        >
          <path fill="none" d="M0 0h24v24H0V0z" />
          <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
        </svg>
      </button>
      <button id="gallery_next">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
        >
          <path fill="none" d="M0 0h24v24H0V0z" />
          <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
        </svg>
      </button>
    </div>
</div>

    <!-- fin du block -->

       

    

      <div class="contact-container">
        <h2><?php  echo $contact_us; ?></h2>
         
          <div>
         
        <!-- <form action="#"> -->
          <input type="text" id="FullName"  placeholder="Full Name" />
          <input type="email"  id="Email_sender"  placeholder="Email" />
          <textarea
            name=""
            id="message_sender"
            cols="30"
            rows="10"
            placeholder="Your Message"
          ></textarea>
          <button type="submit" class="send_admin" id="send_admin">Send</button>

          <span class="error_succes" id="error_succes"  style="display: none;">Success!!</span>
        <!-- </form> -->
        </div>
      </div>

    <!-- End of Contact Section -->

    
    <!-- section partenaires -->

      <section class="partenaire">
        <h2 class="partenaire-title"><?php  echo $nos_partenaire_titre; ?></h2>
        <div class="members">
          <marquee behavior="" direction="left">

            <div class="member-ship" id="member-ship">

            <div>
              
          </marquee> 
        </div>
      </section>

      <!-- End of section -->

      


<?php  require_once('include/footer.php') ?>
