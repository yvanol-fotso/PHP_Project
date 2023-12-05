<?php  
require_once('include/header.php');
require_once('include/navbar.php');

?>
  
<head>
	
	<style type="text/css">
		.partenaire-collab_titre{
			text-align: center;
			margin-top: 15%;
			color:gray;
		}
		.partern_collaborator{
			width: 90%;
	        margin: 5%;
	        padding: 2% 4% 2% 6%;
	        border-bottom: 1px solid rgb(66, 63, 63);
	        border-top: 1px solid rgb(66, 63, 63);
	        box-shadow: 0 4px 13px 3px rgba(39, 37, 37, 0.2);
	        margin-bottom: 5%;
            /*display: flex;*/
		}
		.collaborateur_description{
			display: flex;
			padding:5px;
	        border-top: 1px solid rgb(66, 63, 63);

		}

		.collaborateur_img{
			width: 100px;
			height: 100px;
			border-radius: 50px;
		}

		.collaborateur_info{
			display:  flex;
			margin-left: 10px;
			align-items: center;
		}
		.collaborateur_info p {	
			margin-left: 15px;
			margin-right: 15px;
			/*align-items: center;*/
		}
		.collaborateur_domaine {
			align-items: center;
			margin-top: 40px;
			margin-left: 50px;
		}

	 @media only screen and (max-width: 980px) {
	 	.partenaire-collab_titre{
			text-align: center;
			margin-top: 30%;
			color:gray;
			font-size: 20px;
		}
		.partern_collaborator{
			width: 95%;
	        margin: 3%;
	        padding: 2% 4% 2% 6%;
	        border-bottom: 1px solid rgb(66, 63, 63);
	        border-top: 1px solid rgb(66, 63, 63);
	        box-shadow: 0 4px 13px 3px rgba(39, 37, 37, 0.2);
	        margin-bottom: 5%;
            /*display: flex;*/
		}

		.collaborateur_description{
			display: block;
			padding:5px;
	        border-top: 1px solid rgb(66, 63, 63);

		}

		.collaborateur_img{
			width: 50px;
			height: 50px;
			border-radius: 50px;
		}

		.collaborateur_info{
			display:  flex;
			margin-left: 0px;
			align-items: center;
			font-size: 15px;
		}

		.collaborateur_domaine {
			align-items: center;
			margin-top: 20px;
			margin-left: 10px;
			font-size: 16px;
		}
    
    }
    
    @media only screen and (max-width: 568px) {
    	.partenaire-collab_titre{
			text-align: center;
			margin-top: 40%;
			color:gray;
			font-size: 20px;
		}
		.partern_collaborator{
			width: 95%;
	        margin: 3%;
	        padding: 2% 4% 2% 6%;
	        border-bottom: 1px solid rgb(66, 63, 63);
	        border-top: 1px solid rgb(66, 63, 63);
	        box-shadow: 0 4px 13px 3px rgba(39, 37, 37, 0.2);
	        margin-bottom: 5%;
            /*display: flex;*/
		}

		.collaborateur_description{
			display: block;
			padding:5px;
	        border-top: 1px solid rgb(66, 63, 63);

		}

		.collaborateur_img{
			width: 50px;
			height: 50px;
			border-radius: 50px;
		}

		.collaborateur_info{
			display:  flex;
			margin-left: 0px;
			align-items: center;
			font-size: 14px;
		}

		.collaborateur_domaine {
			align-items: center;
			margin-top: 20px;
			margin-left: 10px;
			font-size: 15px;
		}
    
        
    }
	@media only screen and (max-width: 480px) {
		.partenaire-collab_titre{
			text-align: center;
			margin-top: 40%;
			color:gray;
			font-size: 20px;
		}
		.partern_collaborator{
			width: 95%;
	        margin: 3%;
	        padding: 2% 4% 2% 6%;
	        border-bottom: 1px solid rgb(66, 63, 63);
	        border-top: 1px solid rgb(66, 63, 63);
	        box-shadow: 0 4px 13px 3px rgba(39, 37, 37, 0.2);
	        margin-bottom: 5%;
            /*display: flex;*/
		}

		.collaborateur_description{
			display: block;
			padding:5px;
	        border-top: 1px solid rgb(66, 63, 63);

		}

		.collaborateur_img{
			width: 50px;
			height: 50px;
			border-radius: 50px;
		}

		.collaborateur_info{
			display:  flex;
			margin-left: 0px;
			align-items: center;
			font-size: 14px;
		}

		.collaborateur_domaine {
			align-items: center;
			margin-top: 20px;
			margin-left: 10px;
			font-size: 14px;
		}
    
    }
    
    @media only screen and (max-width: 360px) {
    	.partenaire-collab_titre{
			text-align: center;
			margin-top: 40%;
			color:gray;
			font-size: 20px;
		}
		.partern_collaborator{
			width: 95%;
	        margin: 3%;
	        padding: 2% 4% 2% 6%;
	        border-bottom: 1px solid rgb(66, 63, 63);
	        border-top: 1px solid rgb(66, 63, 63);
	        box-shadow: 0 4px 13px 3px rgba(39, 37, 37, 0.2);
	        margin-bottom: 5%;
            /*display: flex;*/
		}

		.collaborateur_description{
			display: block;
			padding:5px;
	        border-top: 1px solid rgb(66, 63, 63);

		}

		.collaborateur_img{
			width: 50px;
			height: 50px;
			border-radius: 50px;
		}

		.collaborateur_info{
			display:  flex;
			margin-left: 0px;
			align-items: center;
			font-size: 13.5px;
		}

		.collaborateur_domaine {
			align-items: center;
			margin-top: 20px;
			margin-left: 10px;
			font-size: 13.5px;
		}
    
   
    }
    
    @media only screen and (max-width: 320px) {
    	.partenaire-collab_titre{
			text-align: center;
			margin-top: 40%;
			color:gray;
			font-size: 20px;
		}
		.partern_collaborator{
			width: 95%;
	        margin: 3%;
	        padding: 2% 4% 2% 6%;
	        border-bottom: 1px solid rgb(66, 63, 63);
	        border-top: 1px solid rgb(66, 63, 63);
	        box-shadow: 0 4px 13px 3px rgba(39, 37, 37, 0.2);
	        margin-bottom: 5%;
            /*display: flex;*/
		}

		.collaborateur_description{
			display: block;
			padding:5px;
	        border-top: 1px solid rgb(66, 63, 63);

		}

		.collaborateur_img{
			width: 50px;
			height: 50px;
			border-radius: 50px;
		}

		.collaborateur_info{
			display:  flex;
			margin-left: 0px;
			align-items: center;
			font-size: 12px;
		}

		.collaborateur_domaine {
			align-items: center;
			margin-top: 20px;
			margin-left: 10px;
			font-size: 13px;
		}

    	

	}

		
	</style>

</head>

 
 <h1 class="partenaire-collab_titre"><u> Collaborateurs</u></h1>
 
 <div class="partern_collaborator" id="partern_all_collaborator" style="margin-top:10%;">
		  
 </div>



<script type="text/javascript">
	

	window.onload = listCollaborator();

            function listCollaborator(execute = 6){

               var xhttp = new XMLHttpRequest();
                var url = "function/another-index.php";
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                     document.getElementById('partern_all_collaborator').innerHTML = this.response;
                     // alert(this.response); //debogage
                    return true;
                  }
                };
               xhttp.open("POST", url, true);
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var parameters = "value=" + execute;
               xhttp.send(parameters);
            }


</script>

<?php  require_once('include/footer.php') ?>
  