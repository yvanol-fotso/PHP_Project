<?php  
require_once('include/header.php');
require_once('include/navbar.php'); 
require_once('class/Database.php');

?>
<head>
	<style type="text/css">
		h1{
		  margin-top: 10%;
		  margin-bottom: 2%;
		  text-align: center;
		  justify-content: center;
		  color: gray;
	    }

	    h2{
		  margin-top: 2%;
		  margin-bottom: 2%;
		  text-align: center;
		  justify-content: center;
		  color: gray;
	    }

       .comment-form-container {
	     /*background: #F0F0F0;*/
	     border: #e0dfdf 1px solid;
	     padding: 20px;
	     border-radius: 4px;
       }

      .input-row {
	     margin-bottom: 20px;
      }

      .input-field {
	     width: 100%;
	     border-radius: 4px;
	     padding: 10px;
	     border: #e0dfdf 1px solid;
      }

      .btn-submit {
	     padding: 10px 20px;
	     background: #333;
	     border: #1d1d1d 1px solid;
	     color: #f0f0f0;
	     font-size: 0.9em;
	     width: 100px;
	     border-radius: 4px;
	     cursor: pointer;
      }
      ul {
	     list-style-type: none;
      }

      .outer-comment {
	    /*background: #F0F0F0;*/
	    /*width: 80%;*/
	    margin-left:40px;
	    margin-right: 40px;
	    margin-bottom: 5px;
	    padding: 20px;
	    border: #dedddd 1px solid;
	    border-radius: 4px;
       }

       span.comment-row-label {
	    color: #484848;
       }

       span.posted-by {
	    font-weight: bold;
       }

       .comment-info {
	    font-size: 0.9em;
	    padding: 0 0 10px 0;
      }

      .comment-text {
	   margin: 10px 0px 30px 0;
	   color: #3a3a3a;
	   overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/

      }

      .label {
	   padding: 0 0 4px 0;
      }

      img#loader {
	   vertical-align: middle;
	   width: 45px;
	   display: none;
      }

      .comment-row {
	   border-bottom: #e0dfdf 1px solid;
	   margin-bottom: 15px;
	   padding: 15px;
      }

      .answer {
	   cursor: pointer;
	   text-align: center;
      }

      /*je stylise le bouton de retour*/

      .answer .backbtn{
	   margin-top: 4%;
	   margin-bottom: 1%;
       padding: 10px;
       border-radius: 10px;
       background: black;

      }
      .answer .boutonBack{
	   text-decoration: none;
       color: white;
      }

      #comment-count {
	   border-bottom: 1px solid #F0F0F0;
	   border-top: 1px solid #F0F0F0;
	   padding: 8px;
	   font-size: 0.9em;
	   text-align: right;
     }

       
       /*media queries*/
       @media only screen and (max-width: 980px) {
       	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 18px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 18px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }
        
      }
       @media only screen and (max-width: 568px) {
       	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 18px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 18px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }
        
      }
       @media only screen and (max-width: 480px) {
       	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 16px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 16px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }
        
      }
       @media only screen and (max-width: 320px) {
       	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 14px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 14px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }

        
      }

      @media only screen and (max-width: 360px) {
      	h1{
		  margin-top: 35%;
		  margin-bottom: 2%;
		  font-size: 18px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	   .outer-comment {
	 
	      width: 95%;
	      margin-left:10px;	      
	      margin-bottom: 5px;
	      padding: 20px;
	      border: #dedddd 1px solid;
	      border-radius: 4px;
       }

       .comment-text {
	     margin: 10px 0px 30px 0;
	     color: #3a3a3a;
	     font-size: 15px;
	     overflow-wrap: break-word; /*tres puissante cette propriete sa emeche le debordement automatique des elts hors de la boite*/
       }
        
      }


	</style>
</head>

<div class="see-problem">
	 
	 <?php 
         if (isset($_GET['problem_id']) AND !empty($_GET['problem_id'])) {

         	$id = $_GET['problem_id'];

            $sql =" SELECT * FROM probleme
                 LEFT JOIN user
                   ON probleme.id_sender = user.id_user 
                 WHERE  id_pb = $id";

            $stmt = Database::getInstance()
                    ->getDb()
                    ->prepare($sql);
            $stmt->execute();
            $row =  $stmt->fetch(PDO::FETCH_ASSOC);
         }

	  ?>

    <!-- injection des donnees dans la vue -->

     <h1><u>Probl&egrave;me</u></h1>


    <div id="comment-" <?=$row["id_pb"];?> class="comment-info">
	  <div class="outer-comment">
		<div class="comment-info">
			<span class="commet-row-label">from</span> <span class="posted-by"><?=$row["nom"];?> <?= " ";?><?=$row["prenom"];?></span>
			<span class="commet-row-label">at </span> <?=$row["dateP"];?>
		</div>
		<div class="comment-text" id="msgdiv"><?=$row["messageP"];?></div>

		<div class="answer" name="answer" id="answer">
			<button class="backbtn">
               <a href="problemes.php" class="boutonBack">Retour</a>
            </button>   
		</div>
	</div>
   </div>

</div>


<!-- get all reponse/suggestion memeber -->
<h2><u>Reponse</u></h2>

<div class="get_all_reponse" id="get_all_reponse">
	

</div>

<!-- field to add response -->

<div class="sol-problem">
	
     <h1><u>Post response </u></h1>
     <div class="comment-form-container">
        <form id="frmComment" method="post">

            <div class="input-row">
                <div class="label">
                    Message: <span id="message-info"></span>
                </div>
                <textarea class="input-field" id="message"
                    name="message" rows="4"></textarea>
            </div>
            <div>
                <input type="hidden" name="add" value="post" />
                <button type="submit" name="submit" id="submitButton"
                    class="btn-submit">Publish</button>
                <span id="succes-ask" style="display: none; color: green;">Succes!!!</span>
                <span id="failled-ask" style="display: none; color: red;">Failled!!</span>
            </div>
        </form>
     </div>

</div>


<script type="text/javascript">
 

document.getElementById('submitButton').addEventListener('click',function add_answer () 
	{    
		var answer =document.getElementById('message').value;
		
		 var xhttp = new XMLHttpRequest();
		 var url = 'function/problem.php';


		 xhttp.onreadystatechange = function ()
		 {
			 if (this.readyState == 4 && this.status == 200) {

			 	 var data =  JSON.parse(this.response);

				    if (data['status'] == 1)
					 {  
     					document.getElementById('succes-ask').style.display='inline-block';
		                document.getElementById('message').value="";
		              }
		                
				     if(data['status'] == -1){
				     	document.getElementById('failled-ask').style.display='inline-block';
		                document.getElementById('message').value="";
				     }

			 }else{
				    // alert("Code status is not not Ok ");
				   return false;
		      }

		 }

		 xhttp.open("POST", url, true);
		 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 var execute = 2;
		 let parameters = "answer= " + answer + "&problemID=" + <?=$_GET['problem_id'];?> + "&value=" +execute;
		 xhttp.send(parameters);


});


(function show_answer(execute = 3)
    {
        var req = new XMLHttpRequest();
		var url = 'function/problem.php';
        req.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("get_all_reponse").innerHTML= this.response;
                document.getElementById('succes-ask').style.display='inline-block';

           
            }
        };
        req.open("POST", url, true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        let parameters = "problemID=" + <?=$_GET['problem_id'];?> +"&value=" +execute;
		req.send(parameters);


    })();


</script>

<?php  require_once('include/footer.php') ?>
