<?php  
  include 'include/header.php';
  include 'Class/Database/Database.php';
 ?>


<head>
	<title>add_partenaire Collaborator</title>
  <link rel="stylesheet" href="asset/css/styleGlobal_add.css">
	<style type="text/css">
		h2{
			font-size: 25px;
			color: green;
			margin: 5%;
			text-align: center;
		}
		.back{
			display: inline-block;
			background: #607d8b;
			color: white;
			text-align: center;
			border-radius: 15px;
			margin:1% 0% 0% 8%;
			padding: 1%;
			width: 200px;
			height: 30px;
		}
    textarea{
      margin-top: 10px;
    }
	</style>    
</head>


<body>

	 <h2> Add  Collaborator</h2>
     <a href="home.php" class="back">Back To Admin Space</a>

     <?php 
        if ($_FILES && $_POST) {
            
            $nom = $_POST['name'];
            // $image =  $_FILES["image"]["name"];
            $info = $_POST['descrip'];
            $link = $_POST['home_page'];

            // Set image placement folder
            $target_dir = "upload/partenaire/collaborator/";
            // Get file path here i concat the name of user with the name of his image
            $target_file = $target_dir .$_POST['name']. basename($_FILES["image"]["name"]);

            // Get file extension
            $imgExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Allowed file types
            $allowd_file_ext = array("jpg", "jpeg", "png");

            $errors = array();

            if (!in_array($imgExt, $allowd_file_ext)) 
                    $errors['file'] = "Allowed file formats .jpg, .jpeg and .png.";           
            if ($_FILES["image"]["size"] > 2097152) 
                    $errors['file'] = "File is too large. File size should be less than 2 megabytes.";

            if(!filter_var($link,FILTER_VALIDATE_URL)) {  
                    $errors['lien'] = 'Url Non Valide';

            if (empty($errors)) {

               if (!file_exists($target_file)) {

                   if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
  

                      $sql = "INSERT INTO collaborateur
                              SET 
                              image=:image,home_page=:link,nom=:nom,description=:description";


                      $stmt = Database::getInstance()
                               ->getDb()
                               ->prepare($sql);
                       $stmt->bindParam(":image",$target_file);
                       $stmt->bindParam(":link", $link);
                       $stmt->bindParam(":nom", $nom);
                       $stmt->bindParam(":description", $info);
                       $stmt->execute();
                
                   }
                  echo $target_file;
                }else{
                  echo '<font color="red">' ."Partenaire already exists.". '</font>';  
                } 
            }else{
                echo '<font color="red">' ."Image extension is not correct or file is too large.". '</font>';

          } 

        }else{
          echo '<font color="red">' ."Link Does Not Correct.". '</font>';
        }


      }
    
      ?>


<div class="form">
    <form name="env" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" required/>
        <input type="text" name="home_page" placeholder="Home page  / lien https://" required/>
        <textarea name="descrip" class="partern-descrrp" id="" rows="6" cols="54" placeholder="Descriptioon"></textarea>   
        <input type="file" name="image" required/>
        <button>Add Collaborateurs</button>
    </form>
</div>


<?php include 'include/footer.php'; ?>
