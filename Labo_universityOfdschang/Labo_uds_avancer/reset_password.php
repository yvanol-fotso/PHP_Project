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
			height: 300px;
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
			height: 500px;
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
     margin-bottom: 2%;
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
      margin-bottom: 2%;
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
      margin-bottom: 2%;
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
      margin-bottom: 2%;
     } 
     .forgetmail{
      width: 200px;
      height: 30px;
    }
      
	</style>

</head>

<!-- simple pour tester ce module en local il vous faut acceder a cette page en renseignant le token (aller dans la bd et copier et coler comme valeur du parametre url) :et la vous pourrez reset votre mot de passe -->

 <div class="forget-content" id="forget-content">

      <h2>Renseigner Le Nouveau Mot de Passe</h2>

      <p class="redirect" id="reDirect" style="text-align: center; margin-top: 4%"></p>
			
			  <?php if( isset($_GET['authtoken']) && !empty($_GET['authtoken'])) { ?>


			<!-- <form> -->
      <!-- je remplace cette balise form par une div -->
      <div class="form">

				<div id="errorMessge" class="alert-danger hidden"> </div>

			    <div class="form-forget-row">
				    <div class="form-forget-label">Nouveau Password</div>
            <span class="error-fiel" id="error-fiel"></span>

				    <div class="form-forget-element">
					    <input type="Password"  class="forgetmail" name="newPassword" id="ResetnewPassword" required>
				    </div>
			   </div>	

			   <div class="form-forget-row">
				    <div class="form-forget-label">Confirm Password</div>
				    <div class="form-forget-element">
					    <input type="Password"  class="forgetmail" name="confirmNewPassword" id="ResetconfirmNewPassword" required>
				    </div>
			   </div>

			   <input type="hidden" name="action" id="reset-action" value="savePassword" />
			   <input type="hidden" name="authtoken" id="reset-token" value="<?php echo $_GET['authtoken']; ?>" />

			   <button class="forget-valide" id="forget-valide">Valider</button>	

			<!-- </form> -->
     </div> 
		
		<?php }else{
        header('Location:forgortpassword.php');  

    } ?>

 </div>	

	    

<script type="text/javascript">
	    	
document.getElementById('forget-valide').addEventListener('click',function checkMailUpdatePassword()
{   
            	var action = document.getElementById('reset-action').value;
            	var pass = document.getElementById('ResetnewPassword').value;
            	var bisPass = document.getElementById('ResetconfirmNewPassword').value;
            	var jeton = document.getElementById('reset-token').value;

            	var xhttp = new XMLHttpRequest();
                var url = "function/forgotResetSave_password.php";
                
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                       
                     var data = JSON.parse(this.response);

                      if(data['success'] == 0) { 
                         document.getElementById('error-fiel').innerHTML= '<font color="red">' +data['message']+'</font>';

                       } else if(data['success'] == 1 ){
                          document.getElementById('ResetnewPassword').value="";
                          document.getElementById('ResetconfirmNewPassword').value="";

                          document.getElementById('forget-content').style.display = 'hidden';

                         //sa marche mais je veut dabord dire au user que c'est "succes"


                         document.getElementById('reDirect').innerHTML= '<font color="green">' + "Succes wait 2s !!" +'</font>';

                         setTimeout("transition()",3000); 

                         // location.href="index.php"; //joue le mem role
                         // location.assign('index.php'); //joue le meme role
                         
                       }else{
                          return false;
                       }
                      // alert(this.response);    
                       
                  }else{
                     //alert('error');
                     return false;
                  }
                }
               xhttp.open("POST", url, false);
               // xhttp. responseType ="json";
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var execute = 2;
               var parameters = "action=" +action + "&newPassword=" + pass +"&confirmNewPassword=" + bisPass +"&authtoken=" +jeton + "&value=" +execute;
               xhttp.send(parameters);

});

     

  function transition() {
            // body...
      location.href="index.php";
  }        

</script>	



<?php  
require_once('include/footer.php') 
?>

