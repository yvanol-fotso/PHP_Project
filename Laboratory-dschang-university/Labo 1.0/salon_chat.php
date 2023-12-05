<?php  
require_once('include/header.php');
require_once('include/navbar.php');
require_once('class/Database.php');


session_start();

  //je recupere l'id du user courant
    $email = $_SESSION['id'];
    
    $query = "SELECT id_user FROM user WHERE email =:email";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    if ($stmt->rowCount() > 0){

      $res = $stmt->fetch(PDO::FETCH_ASSOC);
      $sender = $res['id_user'];
    }

?>





<div class="salon-container">
	
  <main>

     <header>
        <img src="static/images/index-icon/LOGO.jpg" alt="">
        <div>
            <h2>SALOON CHAT</h2>
        </div>
        <img src="static/images/index-icon/LOGO.jpg" alt="">
     </header>


   <form id="myform" action="#">

     <div class="inner_div" id="chathist">

          
     </div>

       <article>
          <table>
             <tr>

               <th>
                 <textarea 
                 id="msg" 
                 rows='3' cols='50'
                 placeholder="Type your message">
                </textarea>
               </th>
               
               <th>
                <button class="button2" id="submit">Send</button>    
              </th>               
            
           </tr>
        </table>               
    </article>


  </form>

 </main> 


</div>






<script type="text/javascript">
	
	function show_func(){
 
      var element = document.getElementById("chathist");
           element.scrollTop = element.scrollHeight;
  
     }


     (function show_disscussion() {
     	  var xhttp = new XMLHttpRequest();
		    var url = 'function/salon-chat-methode.php';
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {    		
				      document.getElementById("chathist").innerHTML= this.response;
              // alert(this.response);
			      }
        };

		  xhttp.open("POST", url, true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      var parameters = "value=" +1;
      xhttp.send(parameters);

     })();



document.getElementById('submit').addEventListener('click',function send_chat() {
         var xhttp = new XMLHttpRequest();
         var url = 'function/salon-chat-methode.php';
         var messag = document.getElementById("msg").value;
         xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {       
              
              // alert(this.response);
              return true;
            }
        };
       xhttp.open("POST", url, false);
       // xhttp. responseType ="json";
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       var parameters = "message=" +messag+ "&sender_id=" +<?php echo $sender;?>+ "&value=" +2;
       xhttp.send(parameters);
})


</script>




<?php  require_once('include/footer.php') ?>