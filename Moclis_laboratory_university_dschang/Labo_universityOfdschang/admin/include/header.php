<!DOCTYPE html>
<html lang="fr">
<body>

<head>
   <meta charset="utf-8">
     <link rel="icon" type="image/jpg" href="asset/img/LOGO.jpg" />
     <link rel="stylesheet" type="text/css" href="asset/css/styleHeader.css">
   <script type="text/javascript" src="asset/js/js-navbar.js"></script>
</head>

	<div id="root">   
      <div id="topnav" class="topnav">     
         <a id="home_link" class="topnav_link" href="home.php">HOME</a> 

          <nav role="navigation" id="topnav_menu">           
            <a class="topnav_link" href="deconnexion.php">LOGOUT</a>       
            <a class="topnav_link" href="/">BACK/SERVER</a>     
         </nav> 
 
         <a id="topnav_hamburger_icon" href="javascript:void(0);" onclick="showResponsiveMenu()">        <!-- Some spans to act as a hamburger -->
            <span></span>       
            <span></span>       
            <span></span>     
         </a> 
 
         <!-- Responsive Menu -->
         <nav role="navigation" id="topnav_responsive_menu">       
            <ul>         
               <li><a href="home.php">HOME</a></li>         
               <li><a href="/">ABOUT</a></li>         
               <li><a href="/">CONTACT</a></li>        
               <li><a href="/">PRIVACY POLICY</a></li>         
               <li><a href="/">TERMS AND CONDITIONS</a></li>       
            </ul>     
         </nav>   
      </div> 
   </div>
