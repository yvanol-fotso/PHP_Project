<?php  
require_once('include/header.php') ;
require_once('include/navbar.php');
session_start();

?>



    <div class="menber-list-title">
       <h1 class="menber-list-title-echo"><u> Membres</u></h1>
	</div>

	<section class="all-menber" id="list_result">
		
	</section>



	<script>

		(function userAll(execute = 4){

               var xhttp = new XMLHttpRequest();
                var url = "function/another-index.php";
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                     document.getElementById("list_result").innerHTML = this.responseText;
                     // alert(this.response); //debogage
                    return true;
                  }
                };
               xhttp.open("POST", url, true);
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var parameters = "value=" + execute;
               xhttp.send(parameters);
            })();
	</script>




<?php  require_once('include/footer.php'); ?>