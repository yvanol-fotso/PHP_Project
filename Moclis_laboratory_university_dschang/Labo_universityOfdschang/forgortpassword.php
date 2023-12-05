<?php  
Session_start();

require_once('include/header.php') ;
require_once('include/navbar.php'); 
require_once('function/Register.php');
?>

<head>
	<style type="text/css">
		.forget-content{

		}

		.forget-content h2{
			text-align: center;
			margin: 10% 0% 0% 0%;
			color: brown;
		}

		.forget-content .form{
			width: 50%;
			height: 200px;
			background: white;
			margin:4% 0% 5% 24%;

		}

    .forget-content .form-forget-row{
      margin-left: 25%;
    }
    .forget-content .forget-valide{
      margin-left: 28%;
      padding: 8px;
      border-radius: 10px;
      background: brown;
      color:  white;
      border:none;
    }
        
    .forget-content .form-forget-row{
      padding: 4%;
    }
   .form-forget-label{
      margin-bottom: 3%;
    }
   .forgetmail{
      width: 300px;
      height: 30px;
    }


  @media only screen and (max-width: 980px) {
    .forget-content{

		}

		.forget-content h2{
			text-align: center;
			font-size: 20px;
			margin: 25% 0% 0% 0%;
			color: brown;
		}

		.forget-content .form{
			width: 95%;
			height: 300px;
			background: white;
			margin:2%;

		}

		.forget-content .form-forget-row{
      margin-left: 5%;
    }
    .forget-content .forget-valide{
      margin-left: 8%;
    }

   .form-forget-label{
    	margin-bottom: 10%;
    }
    .forgetmail{
    	width: 300px;
      height: 30px;
    }
      
  }
      
  @media only screen and (max-width: 568px) {
    .forget-content{

		}

		.forget-content h2{
			text-align: center;
			font-size: 20px;
			margin: 25% 0% 0% 0%;
			color: brown;
		}

		.forget-content .form{
			width: 95%;
			height: 300px;
			background: white;
			margin:2%;

		}

		.forget-content .form-forget-row{
       margin-left: 5%;
     }
    .forget-content .forget-valide{
    	margin-left: 8%;
    }

   .form-forget-label{
      margin-bottom: 10%;
    }
   .forgetmail{
      width: 300px;
    	height: 30px;
    }
      
      
  }
      
  @media only screen and (max-width: 480px) {
    .forget-content{

		}

		.forget-content h2{
			text-align: center;
			font-size: 20px;
			margin: 25% 0% 0% 0%;
			color: brown;
		}

		.forget-content .form{
			width: 95%;
			height: 300px;
			background: white;
			margin:2%;

		}

		.forget-content .form-forget-row{
       margin-left: 5%;
    }
    .forget-content .forget-valide{
      margin-left: 8%;
    }

   .form-forget-label{
      margin-bottom: 10%;
    }
    .forgetmail{
      width: 300px;
      height: 30px;
    }
      
      
  }
      
  @media only screen and (max-width: 360px) {
    .forget-content{

		}

		.forget-content h2{
			text-align: center;
			font-size: 20px;
			margin: 30% 0% 0% 0%;
			color: brown;
		}

		.forget-content .form{
			width: 95%;
			height: 300px;
			background: white;
			margin:2%;

		}

		.forget-content .form-forget-row{
       margin-left: 5%;
    }
    .forget-content .forget-valide{
      margin-left: 8%;
    }

    .form-forget-label{
      margin-bottom: 10%;
    }
    .forgetmail{
      width: 200px;
      height: 30px;
    }
   } 
      
	</style>
</head>


		<div class="forget-content" id="formToReset">
      
           
      <h2>Mot De Passe Oubli&eacute;</h2>	


      <p class="message-good" id="message-good" style="text-align: center; margin-top: 4%"></p>

			<!-- <form> -->

        
      <!-- je remplace cette balise form par une div -->
      <div class="form">
				<div id="errorMessge" class="alert hidden"> </div>

				<div id ="inputSection" class="form-forget-row">
				  <div class="form-forget-label">Entrer Votre Email De Renitialisation</div>
				    <div class="form-forget-element">
					  <input type="email"  class="forgetmail" name="userEmail" id="forget-email" required>
					  <span class="error-email" id="mailError"></span>
				    </div>
			     </div>
			     
			     <input type="hidden" name="action"  id="forget-action" value="forgetPassword" />	
			    
			    <button class="forget-valide" id="forget-valide">Valider</button>	
       </div>   
			<!-- </form> -->

	  </div>	



<script type="text/javascript">

        
document.getElementById('forget-valide').addEventListener('click',function verifyUserEmail()
{   
            	var action = document.getElementById('forget-action').value;
            	var email = document.getElementById('forget-email').value;

            	var xhttp = new XMLHttpRequest();
              var url = "function/forgotResetSave_password.php";

                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {

                  	var data = JSON.parse(this.response);

                    if(data['success'] == 0) {	
                    	document.getElementById('mailError').innerHTML= '<font color="red">' +data['message']+'</font>';

				            } else if(data['success'] == 1 ){
                        document.getElementById('forget-email').value = "";

				    	        document.getElementById('formToReset').style.display = 'hidden';
				    	       // document.getElementById('inputSection')[0].addClass('hidden'); si plusieur tableau

                      document.getElementById('message-good').innerHTML= '<font color="green">' +data['message'] +'</font>';
                      //alert(this.response);		deboggage
				           }else{

                    return false;
    
                   }
				        

                  }else{
                    // alert('error');
                    return false;
                  }

                };

               xhttp.open("POST", url, true);
               // xhttp. responseType ="json";
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var execute = 1;
               var parameters = "action=" +action + "&userEmail=" +email +"&value=" +execute;
               xhttp.send(parameters);

 });
	    	

 </script>	

<?php  
require_once('include/footer.php') 
?>

