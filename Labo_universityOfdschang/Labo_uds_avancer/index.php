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
         <a href="collaborateurs.php" class="button"><?php echo  $slider3_button1; ?></a>  
         <a href="membres.php" class="button"><?php  echo  $slider3_button2; ?></a> 

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
       <span class="items">+<?php echo $module1_domainerech_items1 ?></span>
       <span class="items">+<?php echo $module1_domainerech_items2 ?></span>   
       <span class="items">+<?php echo $module1_domainerech_items3 ?></span>   

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

    <!-- apres une nouvelle capture des besoins ,voici ca quoi un evenement ressemble -->

  <div class="mod-even-title">

    <div class="even-title_">
       <h1> <font color=" white">CAMEROON’S FIRST SCHOOL ON NONLINEAR DYNAMICS AND COMPLEX SYSTEMS ON HYPERGRAPHS </font></h1>
    </div>

    <div class="even-due-date">
      25-28 Sept ,2023
    </div>

  </div>

   <!-- End of the header -->
    <div class="mod-even-all" style="margin-top:5%; ">


      <div class="mod-even-left">

        <div class="first-block titre-even"> 

          <font color="#067db4"> <p style=" font-size: 20px;">Aims</p></font> <br>

          <p>
           The aim of this school is to extend and improve the locals understanding 
           of nonlinear dynamics by introducing among new ways of investigation, the theory 
           of hypergraphs and their applications on complex systems.
          </p>
        </div>

        <div class="first-block description"> 

          <font color="#067db4"> <p style=" font-size: 20px;">Description</p></font> <br>

           <p> 
             In order to get more deeper in the analysis of the dynamics of real 
             systems such as biology, economy, engineering and social science, 
             the school first goal is to introduce new developed theories, analytics 
             and experimental methods that improve investigation in complex systems.

             <br></br>

             Secondly, as it was found that hypergraphs have properties that are 
             more suitable to describe real life networks than graphs and considering 
             the fact that, investigation on complex systems based on hypergraphs become 
             a hot topic in this field, the school principal goal is to introduce and leads 
             the students and researchers in our region into this active domain. The school will 
             be a very good platform of exchanges with specialists and lectures will be on site and online.

             <br></br>
             During the four days time of the school, there will be lectures, scientific exchanges and posters 
             session. The accepted participants should attend all the school and posters presentations is obligatory 
             for all students on site.

           </p>

        </div>


        <div class="first-block topics">

          <font color="#067db4"> <p style=" font-size: 20px;">Topics </p></font> <br>

         
          <span class="topics listing">
            <li> The aim of this school is to extend and improve</li>
            <li> The aim of this school is to extend and improve</li>
            <li> The aim of this school is to extend and improve</li>
            <li> The aim of this school is to extend and improve</li>
            
          </span>
        </div>


      </div>

      <!-- end boite gauche -->

      <div class="mod-even-right">

       <div class="second-block organizers">

          <font color="#067db4"> <p style=" font-size: 20px;">Organizers </p></font> <br>

           <span> 

            <li>Patrick LOUODOP, <span style=" font-size: 11px; color:#067db4"> University of Dschang, Cameroon </span></li>
            <li>Timoteo Carletti, <span style=" font-size: 11px; color:#067db4"> naXys, University of Namur, Belgium</span></li>
            <li>Thierry Njougouo, <span style=" font-size: 11px; color:#067db4"> naXys & University of Buea, Belgium & Cameroon </span></li>
            <li>Riccardo Muolo, <span style=" font-size: 11px; color:#067db4"> naXys & University of Buea, Belgium & Cameroon</span></li>
            
           </span>
       </div>


       <div class="second-block local-organizers">

          <font color="#067db4"> <p style=" font-size: 20px;">Local organizers</p></font> <br>

           <span> 


            <li>Patrick LOUODOP</li>
            <li>Victor Kuetche</li>
            <li>Hilaire Fotsin</li>
           

           </span>
       </div>

        <div class="second-block speakers">

          <font color="#067db4"> <p style=" font-size: 20px;">Speakers</p></font> <br>

           <span> 

            <li>Samuel Bowong, <span style=" font-size: 11px; color:#067db4">University of Douala, Cameroon </span></li>
            <li>Hilda Cerdeira,<span style=" font-size: 11px; color:#067db4"> ICTP-SAIFR , Brazil </span> </li>
            <li>Timoteo Carletti, <span style=" font-size: 11px; color:#067db4">naXys, University of Namur, Belgium </span> </li> 
            <li>Thierry Njougouo,<span style=" font-size: 11px; color:#067db4"> naXys & University of Buea, Belgium & Cameroon </span> </li>
            <li>Romeo Mbendjo,<span style=" font-size: 11px; color:#067db4"> University of Yaounde I, Cameroon </span></li>
            <li>Romanic Kengne, <span style=" font-size: 11px; color:#067db4">University of Dschang, Cameroon  </span></li>
            <li>Fernando Ferreira,<span style=" font-size: 11px; color:#067db4"> University of Sao Paul , Brazil  </span></li>
            <li>Riccardo Muolo, <span style=" font-size: 11px; color:#067db4">naXys, University of Namur, Belgium  </span></li>
            <li>Beverly Hartline,<span style=" font-size: 11px; color:#067db4"> Montana Technological University, USA  </span></li>
            <li>Sifeu Takougang, <span style=" font-size: 11px; color:#067db4">University of Maroua, Cameroon  </span></li>
            <li>Billy Djupkep, <span style=" font-size: 11px; color:#067db4">National Research Council Ottawa ON, Canada  </span></li>
            <li>Mathurin Ateuafack,<span style=" font-size: 11px; color:#067db4"> University of Buea, Cameroon  </span></li>

           
           </span>
       </div>


      </div>

      <!-- end seconde boite droite -->

    </div>

    <div class="mod-even-more-inform">
      
      <div class="mod-even-infosupplementaire">

        <div class="mod-infosupp-left">

          <p>
            
            <span style=""> <b>Application :</b> </span>
            <br><br>
            Applicants must send their presentation 
            abstract or poster to <b>moclisuds@gmail.com </b> before July 30, 
            2023. For further information, please contact Steve KONGNI 
            at <b>steve.kongni@univ-dschang.org </b>.
          </p>
          
        </div>

         <div class="mod-infosupp-right">

          <br><br>

            <span style=""> <b>Registration Fees:</b> </span>

            <br><br>
            There is no registration fee, the school is free to everyone.
            The number of places is restricted.

            <br></br>

            <span style=""> <b> Contact:</b> </span>
              <br>
               00237 695086975 (Patrick Louodop) 
              <br>
               00237 678525260 (Steve Kongni)
          
        </div>
        
      </div>

      <div class="mod-even-address">

        
        <div class="address-localisation" style="display: flex;align-items: center;text-align: center;">

          <div>
             <img src="static/images/images-even/loc1.png"> 
          </div>

          <p style="align-items: center;">
             <b>: </b>Campus of the University of Dschang, 
            Cameroon
         </p>
          
        </div>
         

         <div class="address-mail" style="display: flex;align-items: center;text-align: center;">

          <div>
             <img src="static/images/images-even/mail3.png"> 
          </div>

          <p style="align-items: center;">
             <b>: <b>moclisuds@gmail.com </b> /
                  <b>steve.kongni@univ-dschang.org </b>.
         </p>
          
        </div>

        <div class="address-date" style="display: flex;align-items: center;text-align: center;">

          <div>
             <img src="static/images/images-even/date.png"> 
          </div>

          <p style="align-items: center;">
             <b>: </b> Deadline 30 July, 2023
                  
         </p>
          
        </div>
        
      </div>

    </div>

    <!-- fin -->

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
