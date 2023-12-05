<?php  require_once('include/header.php') ?>

<?php require_once('include/navbar.php') ?>

<head>
	
	<style type="text/css">
    .partenaire-title-space{
      margin-top:10%;
      text-align:center;
      color:gray;
    }

    .partern-block-storie{
      display: flex;
      flex-wrap:wrap;
      width: 90%;
          margin: 5% 10% 5% 5%;
          padding: 1% 0 1% 0;
          box-shadow: 1px 1px 5px 5px gray;
          border-radius: 20px;

    }

    .partern-block-storie .partern-content-descrip div{
            background: #3a3737c4;
            color:  white;
            font-size: 20px;
            border-radius: 15px;
            padding: 1px;

    }

    .partern-content-descrip{
      margin: 2%; 
      width: 220px; 

    }

    .partern-content-descrip div>p{
      padding: 5px;
    }

    .partern-content-descrip img{
      width: 220px;
      height: 200px;    

    }

    .partern_descrip_block{
          text-align: center;
          padding: 10px;

    }

    .partern_descrip_block p{
          padding: 15px;
          font-size: 20px;

    }

  
    @media only screen and (max-width: 980px) {
    
    }
    
    @media only screen and (max-width: 568px) {
    .partern-block-storie .partern-content-descrip div{
      background: #3a3737c4;
            color:  white;
            font-size: 20px;
            border-radius: 15px;
            padding: 1px;
      margin-left:3%    


    }

    .partern-content-descrip{
      margin: 1%;   

    }

    .partern-content-descrip img{
      width: 210px;
      height: 200px;
      margin-left:3%; 
      border-radius: 15px;
        

    }
        
    }
		@media only screen and (max-width: 480px) {
    
    }
    
    @media only screen and (max-width: 360px) {
    
   
    }
    
    @media only screen and (max-width: 320px) {

    	.partenaire-title-space{
			margin-top:40%;
			text-align:center;
			font-size: 22px;
			color:gray;
		}
		.partern-block-storie .partern-content-descrip div{
			background: #3a3737c4;
      color:  white;
      font-size: 20px;
      border-radius: 15px;
      padding: 1px;
			margin-left:3%		


		}

		.partern-content-descrip{
			margin: 2%;		

		}

		.partern-content-descrip img{
			width: 95%;
			height: 160px;
			margin-left:3%;	
			border-radius: 15px;
				

		}

  }
    
		
	</style>
</head>
  
 <h1 class="partenaire-title-space"><u>Universite&eacute;s partenaires</u></h1>
 
 <div class="partern-block-storie" id="partern-block-storie">

		  
 </div>







<script type="text/javascript">
	

	window.onload = listUniversity();

            function listUniversity(execute = 7){

               var xhttp = new XMLHttpRequest();
                var url = "function/another-index.php";
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                     document.getElementById('partern-block-storie').innerHTML = this.response;
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
