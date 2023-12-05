<?php 
include 'include/header.php';  
include 'Class/Database/Database.php';

?>



<head>
	<title>Contact_us</title>
    

	<style type="text/css">
		

		h2{
			font-size: 25px;
			color: green;
			margin: 5%;
			text-align: center;
		}
		.back{
			margin:1% 0% 0% 15%;
			padding: 1%;
			width: 200px;
		}
		.sender_delete{
			display: inline-block;
			background: #607d8b;
			color: white;
			text-align: center;
			border-radius: 15px;
			margin:1% 0% 0% 80%;
			padding: 1%;
			width: 200px;
			height: 30px;
		}

		.sender_delete a{
			text-decoration: none;
			background: #607d8b;
			color: white;
			text-align: center;
			
		}

		.listing_meco{
			width: 60%;
	        margin: 1% 5% 0% 15%;
	        padding: 2% 4% 2% 6%;
	        border-bottom: 1px solid rgb(66, 63, 63);
	        border-top: 1px solid rgb(66, 63, 63);
	        box-shadow: 0 4px 13px 3px rgba(39, 37, 37, 0.2);
	        margin-bottom: 5%;
            display: flex;
		}
	</style>
	
</head>
<!-- <body> -->

    <?php 

      if(isset($_GET['id_mess'])){
      
        $id = $_GET['id_mess'];

        $sql = "DELETE FROM contatc_us WHERE id=:id";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo "Suppression Ok!!";
      }
 

   ?>

          
	<div  id="message_send_by_user" onload="load_message()" >
		
		
	</div>



<script type="text/javascript">

(function load_message() {

    var xhttp = new XMLHttpRequest();
    var url = "../function/another-index.php";

		 xhttp.onreadystatechange = function ()
		 {
			 if (this.readyState == 4 && this.status == 200) {

				 document.getElementById('message_send_by_user').innerHTML= this.response;
			 
			 }else{
			 	// alert("Failed to List Message!");
			    return false;
			 }				 
		 }

		 xhttp.open("POST", url, true);
		 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 var execute = 9;	 
		 var parameters = "value=" +execute;
		 xhttp.send(parameters);
		 // xhttp.send(null);

		
})();


</script>


<?php include 'include/footer.php'; ?>