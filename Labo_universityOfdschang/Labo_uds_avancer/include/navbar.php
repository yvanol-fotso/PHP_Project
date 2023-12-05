<?php ob_start();?>
<!-- here i want to change the style of my navbar but when i do in the css file the cant not take -->
<div class="top-nav" style="background-color:#1491ba">
   <div class="wrapper">

        <div class="logo-icon">
          <a href="/Labo/admin">
            <img src="static/images/index-icon/logo.jpg" alt="" style="width: 40px;height: 40px;margin-top: 5px;border-radius: 50%;">
          </a>
        </div>

        <nav>
          <ul>
            <li>
              <a href="index.php">Accueil</a>
            </li>

            <li>
               <a href="espacepublication.php">Publication</a>
            </li>

            <li>
              <a href="profile.php">Profile</a>
            </li>
            <li>
               <a href="Connexion.php">Connexion</a>
            </li>
            <li>
              <a href="Deconnexion.php">Deconnexion</a>
            </li>
            <li>
              <a href="?l=fr">Fr</a><font color="white">|</font><a href="?l=en">En</a>
            </li>
            <li>
              <a href="problemes.php">PROBL&Egrave;MES</a>
            </li>

          </ul>
        </nav>
       
        <!-- partie mobile  -->
        <div class="mobile-menu-icon">
          <img src="static/images/index-icon/menu-icon.png" alt="" />
        </div>

        <div class="mobile-menu-container">

          <ul>
            <li>
              <a href="index.php">Accueil</a>
            </li>
            <li>
              <a href="profile.php">Profile</a>
            </li>

            <li>
              <a href="espacepublication.php">Publication</a>
            </li>
   
            <li>
               <a href="Evenement.php">Evenement</a>
            </li>

            <li>
              <span style="font-size: 18px;"><font color="white">Lang : </font></span>
              <a href="?l=fr">Fr</a> <font color="white">|</font> <a href="?l=en">En</a>           
            </li>
          
            <li>
              <a href="problemes.php">Probl&egrave;mes</a>
            </li>
            <li>
              <a href="connexion.php">Connexion</a>
            </li>

            <li>
               <a href="deconnexion.php">Deconnexion</a>
            </li>
        
          </ul>

        </div>

        <div class="menu-close-icon">
          <img src="static/images/index-icon/close-icon.png" alt="" />
        </div>
      
      </div>
    </div>

