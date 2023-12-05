<?php  
require_once('include/header.php');
require_once('include/navbar.php');
?>
  
<head>

	<style type="text/css">

		.partenaire-title-space{
			margin-top:10%;
      margin-bottom: 5%;
			text-align:center;
			color:gray;
		 }
	      .partern_item{
          text-align: center;
          margin-bottom: 25%;
        }

        .partern_school{
        	display: inline;
        }
        .partern_collaborator{
        	display: inline;
        }

       .partern_school a {
       	 display: inline-block;     
        text-decoration: none;
        background: rgb(54, 54, 53);
        color: white;
        border-radius: 20px;
        padding: 1.5%;
        margin: 2%;
       }
       
       .partern_collaborator a{
       	display: inline-block;     
        text-decoration: none;
        background: rgb(54, 54, 53);
        color: white;
        border-radius: 20px;
        padding: 1.5%;
        margin: 2%;
       }
       .partern_school a:hover{
       	 transform:scale(1.01);
	       box-shadow: 2px 2px 1px 1px gray;
       }
       .partern_collaborator a:hover{
       	transform:scale(1.01);
	      box-shadow: 2px 2px 1px 1px gray;
       }

		
    @media only screen and (max-width: 980px) {

        .partern_item{
          text-align: center;
          margin-bottom: 25%;
        }

        .partenaire-title-space{
        margin-top:25%;
        margin-bottom: 5%;
        text-align:center;
        font-size: 22px;
        color:gray;
      }

      .partern_school a {
           display: inline-block;     
           text-decoration: none;
           background: rgb(54, 54, 53);
           color: white;
           border-radius: 20px;
           padding: 1.5%;
           margin: 2%;
       }
       
       .partern_collaborator a{
        display: inline-block;     
        text-decoration: none;
        background:rgb(54, 54, 53);
        color: white;
        border-radius: 20px;
        padding: 1.5%;
        margin-top: 6%;
       }
    
    }

    @media only screen and (max-width: 568px) {

        .partern_item{
          text-align: center;
          margin-bottom: 20%;
        } 

        .partern_school a {
           display: inline-block;     
           text-decoration: none;
           background: rgb(54, 54, 53);
           color: white;
           border-radius: 20px;
           padding: 1.2%;
           margin: 2%;
       }
       
       .partern_collaborator a{
        display: inline-block;     
        text-decoration: none;
        background:rgb(54, 54, 53);
        color: white;
        border-radius: 20px;
        padding: 1.2%;
        margin-top: 6%;
       }
    }
    
    @media only screen and (max-width: 480px) {
      .partenaire-title-space{
        margin-top:25%;
        text-align:center;
        font-size: 22px;
        color:gray;
      }
      .partern_school a {
           display: inline-block;     
           text-decoration: none;
           background: rgb(54, 54, 53);
           color: white;
           border-radius: 20px;
           padding: 3%;
           margin: 2%;
       }
       
       .partern_collaborator a{
        display: inline-block;     
        text-decoration: none;
        background:rgb(54, 54, 53);
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin-top: 6%;
       }
    }
    
    @media only screen and (max-width: 360px) {
      .partenaire-title-space{
        margin-top:40%;
        text-align:center;
        font-size: 22px;
        color:gray;
      }
      .partern_school a {
           display: inline-block;     
           text-decoration: none;
           background: rgb(54, 54, 53);
           color: white;
           border-radius: 20px;
           padding: 3%;
           margin: 2%;
       }
       
       .partern_collaborator a{
        display: inline-block;     
        text-decoration: none;
        background:rgb(54, 54, 53);
        color: white;
        border-radius: 20px;
        padding: 3%;
        margin-top: 6%;
       }
   
    }
    
    @media only screen and (max-width: 320px) {

    	.partenaire-title-space{
			  margin-top:40%;
			  text-align:center;
			  font-size: 22px;
			  color:gray;
		  }

		.partern-content-descrip img{
			   width: 95%;
			   height: 160px;
			   margin-left:3%;	
			   border-radius: 10px;
		}
		.partern_school a {
       	   display: inline-block;     
           text-decoration: none;
           background: rgb(54, 54, 53);
           color: white;
           border-radius: 20px;
           padding: 4%;
           margin: 2%;
       }
       
       .partern_collaborator a{
       	display: inline-block;     
        text-decoration: none;
        background:rgb(54, 54, 53);
        color: white;
        border-radius: 20px;
        padding: 4%;
        margin-top: 6%;
       }

    }
    
	</style>

</head>
<body>
     

    <h1 class="partenaire-title-space"><u>Consulter</u></h1>

    <div class="partern_item">
        <div class="partern_collaborator"><a href="collaborateurs.php" class="partern_collab">Collaborateurs</a></div>
        <div class="partern_collaborator"><a href="membres.php" class="partern_collab">Membres</a></div>
        <div class="partern_school"><a href="school_partner.php" class="partern_school_link">Universit&eacute;s</a></div>

    </div>

</body>

<?php  require_once('include/footer.php') ?>
