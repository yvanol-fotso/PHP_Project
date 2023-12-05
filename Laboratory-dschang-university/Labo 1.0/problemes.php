<?php  
session_start();

require_once('include/header.php');
require_once('include/navbar.php'); 

require_once('class/Database.php');
require_once('class/Paginator.php');


if (!$_SESSION['id']) {
   header('location: connexion.php');
 }
 
?>

	<head>
	  <style type="text/css">


	    h1{
		  margin-top: 8%;
		  margin-bottom: 2%;
		  text-align: center;
		  justify-content: center;
		  color: gray;
	    }
	    /*style the paginator block*/
        #pageElement{
          text-align: center;
          margin-bottom: 5%;
          margin-top: 2%;
        } 
       /*style the paginator block*/

        /*style pour checkbox pour activer les notification*/

          /*style pour checkbox pour activer les notification*/
        .notifSubscription{
        	margin-top: 10%;
        	margin-left: 70%;
        }

        input[type="checkbox"].subsNotification{
     	  display: none;
        }
        input[type="checkbox"].subsNotification + .labSubsription{
     	 box-sizing: border-box;
     	 display: inline-block;
     	 width: 3rem;
     	 height: 1.5rem;
     	 border-radius: 1.5rem;
     	 padding: 2px;
     	 background-color: #cd283f;
     	 transition: all 0.5s;      	
       }

       

       input[type="checkbox"].subsNotification + .labSubsription::before{
     	 box-sizing: border-box;
     	 display: block;
     	 content: " ";
     	 height: calc(1.5rem - 4px);
     	 width: calc(1.5rem - 4px);
     	 border-radius: 50%;
     	 background-color: #fff;
     	 transition: all 0.5s;
       } 
       input[type="checkbox"].subsNotification:checked + .labSubsription{
     	 background-color: #2ca145;
       }
       
       input[type="checkbox"].subsNotification:checked + .labSubsription::before{
        margin-left: 1.5rem;
       } 

        
       /*fin*/


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
	   color: #0000FF;
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
		  margin-top: 10%;
		  margin-bottom: 2%;
		  font-size: 18px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }


	    /*style pour checkbox pour activer les notification*/
        .notifSubscription{
        	margin-top: 15%;
        	margin-left: 20%;
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
		  margin-top: 10%;
		  margin-bottom: 2%;
		  font-size: 18px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }


	    /*style pour checkbox pour activer les notification*/
        .notifSubscription{
        	margin-top: 25%;
        	margin-left: 30%;
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
		  margin-top: 10%;
		  margin-bottom: 2%;
		  font-size: 16px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }


	    /*style pour checkbox pour activer les notification*/
        .notifSubscription{
        	margin-top: 35%;
        	margin-left: 25%;
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
		  margin-top: 10%;
		  margin-bottom: 2%;
		  font-size: 14px;
		  text-align: center;
		  justify-content: center;
		  color: #3a3a3a;
	    }

	    /*style pour checkbox pour activer les notification*/
        .notifSubscription{
        	margin-top: 35%;
        	margin-left: 20%;
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
		  margin-top: 10%;
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

<body>


  


    <!-- subscription pour les notification -->
   <div class="notifSubscription" id="notifSubscription">
   	   <span>D&eacute;sactiver les Notifications</span>
	   <input type="checkbox" name="subsNotification" class="subsNotification" id="subsNotification" >
       <span for="subsNotification" class="labSubsription"></span>
   </div>
    <!-- fin -->



	<div class="problem_place">
		<h1 class="title_problem"><u> Probl&egrave;mes </u></h1>

		
	</div>



	<div class="content-problem" id="showProblem"> 

		  <?php 
		     $pages = new Paginator('4','p');

             $query1 = "SELECT id_pb FROM probleme ORDER BY dateP DESC"; 

             $stmt1 = Database::getInstance()
                    ->getDb()
                    ->prepare($query1);
             $stmt1->execute();

             //pass number of records to
             $pages->set_total($stmt1->rowCount()); 

	
             $sqlQuery = "SELECT * FROM probleme p
                           INNER JOIN  user u 
                             WHERE u.id_user =  p.id_sender
                          ORDER BY p.dateP DESC ".$pages->get_limit();

            $stmt = Database::getInstance()
                    ->getDb()
                    ->prepare($sqlQuery);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
   
             $outputString = '';
  
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
              // foreach($stmt as $row): 
  
              // foreach begin sont parcour a 2 

              $outputString.= '
                 <div id="comment-'.$row["id_pb"].' class="comment-info">
	                <div class="outer-comment">
		               <div class="comment-info">
			             <span class="commet-row-label">from</span> <span class="posted-by">'.$row["nom"].' '.$row["prenom"].'</span>
			             <span class="commet-row-label">at</span>  '.$row["dateP"].'
		               </div>
		               <div class="comment-text" id="msgdiv">'.$row["messageP"].'</div>

		               <div class="answer" name="answer" id="answer">
                         <a href="problemAnswer.php?problem_id= '.$row["id_pb"].' ">Repondre</a>
		               </div>
	                </div>
                 </div>';

             // endforeach;
            }

            echo $outputString;
           }else{
            echo '<p style = "text-align:center;"><font style="margin-left:0%;" color=green><b><i> VIDE </font></p>';

           }

		?>
		
	</div>



     <!-- paginaion evenement passe -->
    <div id="pageElement">      
          <?php  echo $pages->page_links(); ?>
    </div> 
    <!-- fin pagination  -->


	<div class="ask-problem">
	
     <h1><u>Post your problem</u></h1>


     <div class="comment-form-container">
     	<!-- la balise form fait la page se recharger -->
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

document.getElementById('submitButton').addEventListener('click',function add_probleme () 
	{    
		var problem =document.getElementById('message').value;
		
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
         // xhttp. responseType ="json";
		 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 var execute = 1;
		 let parameters = "problem= " + problem + "&value=" +execute;
		 xhttp.send(parameters);

});

    // window.onsetInterval(probleme(execute = 2),1000);
    // window.setTimeout(probleme(execute = 2),1000);


document.getElementById('notifSubscription').addEventListener('click',function change(){

			var resul = document.getElementById('subsNotification').hasAttribute("checked");

			if(!resul){
			 // document.getElementById('subsNotification').setAttribute("checked"," ");
			
               var update = 1 ;
               var execute = 4;
			   var xhttp = new XMLHttpRequest();
		       var url = 'function/problem.php';
               
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                  
				      if (this.response == 1)
					  { 
                        document.getElementById('subsNotification').setAttribute('checked','');

		              }

		             // alert(this.response);//deboggage
		                
                  }else{
                  	//alert('error');
                  	return false;
                  }


                };


               xhttp.open("POST", url, true);
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var parameters ="newStatus=" + update + "&value=" + execute;
               xhttp.send(parameters);




		  }else{
		  	// document.getElementById('subsNotification').removeAttribute("checked");


		  	   var update = 0 ;
               var execute = 4;

			   var xhttp = new XMLHttpRequest();
		       var url = 'function/problem.php';
               
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                  

				      if(this.response== 0){
		  	            document.getElementById('subsNotification').removeAttribute("checked");
				     	
				      }
                     
                  }else{
                  	//alert('error');
                  	return false;
                  }


                };


               xhttp.open("POST", url, true);
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var parameters ="newStatus=" + update + "&value=" + execute;
               xhttp.send(parameters);


		  }

});




 (function getStatus(execute = 5){

          var xhttp = new XMLHttpRequest();
		  var url = 'function/problem.php';
               
           xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
                  {
                  
				if (this.response == 1)
			      { 
                    document.getElementById('subsNotification').setAttribute('checked','');

		           }
		                
				   if(this.response == 0){
		  	         document.getElementById('subsNotification').removeAttribute("checked");
				     	
				   }

				     // alert(this.response); //deboggage
                     
             }else{
                //alert('error');
                return false;
             }


          };


           xhttp.open("POST", url, true);
           xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           var parameters = "value=" + execute;
           xhttp.send(parameters);
})();





 </script>



</body>

<?php  require_once('include/footer.php') ?>
