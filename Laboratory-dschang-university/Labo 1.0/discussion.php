<?php  
require_once('include/header.php'); 
require_once('include/navbar.php');
require_once('function/Register.php');

session_start();

 // if (!$_SESSION['id']) {
 //   header('location: connexion.php');
 // }
 
?>

<head>
  

   <style type="text/css">
   	 .echange_space  h2{
   	  	color: gray;
   	  	text-align: center;
   	  	margin-top: 15%;
   	  	margin-bottom: 5%;
   	  }

      .notificationtype{
        text-align: center;
        margin: 2%;
        padding: 1%;
        display: flex;
      }
      .notificationtype .message-notification, .group-notification,.group-visioconference{
        margin-left: 16%;
        width: 120px;
      }
      .message-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
        width: 140px;
      }
      .group-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
        width: 140px;
      }

      .group-visioconference a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
        width: 140px;
      }
      

      @media only screen and (max-width: 980px) {
        .echange_space  h2{
        color: gray;
        text-align: center;
        margin-top: 20%;
        margin-bottom: 5%;
        font-size: 22px
      }

      .notificationtype{
        text-align: center;
        margin: 2%;
        padding: 2%;
      }
       .notificationtype .message-notification, .group-notification,.group-visioconference{
        margin-left: 10%;
        width: 100px;
      }
      .message-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding:10%;
        margin: 2%;
       
      }
      .group-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;

      }

      .group-visioconference a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
      }
       
      }

      @media only screen and (max-width: 790px) {
      .echange_space  h2{
        color: gray;
        text-align: center;
        margin-top: 30%;
        margin-bottom: 5%;
        font-size: 20px
      }

      .notificationtype{
        text-align: center;
        margin: 2%;
        padding: 2%;
      }
       .notificationtype .message-notification, .group-notification,.group-visioconference{
        margin-left: 6%;
        width: 100px;
      }
      .message-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
        width: 100px;
       
      }
      .group-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
        width: 100px;


      }

      .group-visioconference a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
        width: 100px;

       }
      
      }

      @media only screen and (max-width: 580px) {
        .echange_space  h2{
        color: gray;
        text-align: center;
        margin-top: 35%;
        margin-bottom: 5%;
        font-size: 20px
      }

      .notificationtype{
        text-align: center;
        margin: 2%;
        padding: 2%;
      }

       .notificationtype .message-notification, .group-notification,.group-visioconference{
        margin-left: 7%;
        width: 100px;
      }
      .message-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
        width: 75px;
       
      }
      .group-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
        width: 75px;

      }

      .group-visioconference a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 10%;
        margin: 2%;
        width: 75px;

       }
      
      }

      @media only screen and (max-width: 460px) {
        .echange_space  h2{
        color: gray;
        text-align: center;
        margin-top: 40%;
        margin-bottom: 5%;
        font-size: 16px
      }

      .notificationtype{
        text-align: center;
        margin: 2%;
        padding: 2%;
      }

       .notificationtype .message-notification, .group-notification,.group-visioconference{
        margin-left: 5%;
        width: 100px;
      }
      .message-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 8%;
        margin: 2%;
       
      }
      .group-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 8%;
        margin: 2%;

      }

      .group-visioconference a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 8%;
        margin: 2%;
       }
       
    }

      @media only screen and (max-width: 360px) {
        .echange_space  h2{
        color: gray;
        text-align: center;
        margin-top: 40%;
        margin-bottom: 5%;
        font-size: 16px
      }

      .notificationtype{
        text-align: center;
        margin: 2%;
        padding: 2%;
        display: block;
      }
      .notificationtype .message-notification, .group-notification,.group-visioconference{
        margin-left: 30%;
        width: 140px;
      }
      .message-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin: 2%;
        width: 140px;
       
      }
      .group-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin: 2%;
        width: 140px;

      }

      .group-visioconference a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin: 2%;
        width: 140px;
       }
       
    }

      @media only screen and (max-width: 320px) {
        .echange_space  h2{
        color: gray;
        text-align: center;
        margin-top: 45%;
        margin-bottom: 5%;
        font-size: 15px
      }

      .notificationtype{
        text-align: center;
        margin: 2%;
        padding: 2%;
      }
      .notificationtype .message-notification, .group-notification,.group-visioconference{
        margin-left: 25%;
        width: 140px;
      }
      .message-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin: 2%;
       
      }
      .group-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin: 2%;

      }
      
      .group-visioconference a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin: 2%;
       }
      }

      @media only screen and (max-width: 293px) {
      .echange_space  h2{
        color: gray;
        text-align: center;
        margin-top: 50%;
        margin-bottom: 5%;
        font-size: 14px
      }

      .notificationtype{
        text-align: center;
        margin: 2%;
        padding: 2%;
      }
      .notificationtype .message-notification, .group-notification,.group-visioconference{
        margin-left: 15%;
        width: 140px;
      }
      .message-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin: 2%;
       
      }
      .group-notification a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin: 2%;

      }

      .group-visioconference a{
        display: inline-block;     
        text-decoration: none;
        background: #333;
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin: 2%;
      }
     

    }

      
   </style>

</head>


    <div class="echange_space">
    	<h2 class=""><u> Discussions</u></h2>

      <div class="notificationtype">
         <div class="message-notification"><a href="listemembres.php">Messages</a></div>
         <div class="group-notification"><a href="salon_chat.php">Groupe</a></div>
         <div class="group-visioconference"><a href="">Meet</a></div>
      </div>

    </div>


<?php 
 
  require_once('include/footer.php');
  
?>