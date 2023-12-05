<?php
  include 'include/header.php';  
  include 'Class/Database/Database.php';
 ?>



<head>
	<title>add_video</title>
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
	</style>
</head>


<body>

	 <h2> Add Video</h2>
     <a href="home.php" class="back">Back To Admin Space</a>


      <?php 
             
        if ($_FILES && $_POST) {

            $nom = $_POST['name'];
            // $image =  $_FILES["image"]["name"];

            $date = $_POST['date'];
            
            $description = $_POST['descript'];


            // Set image placement folder
            $target_dir = "upload/videos/";
            // Get file path here i concat the name of user with the name of his image
            $target_file = $target_dir .$_POST['name']. basename($_FILES["file"]["name"]);

            // Get file extension
            $videoExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Allowed file types
            $allowd_file_ext = array("mp3", "mp4", "avi","gif");

            $errors = array();

            if (!in_array($videoExt, $allowd_file_ext)) 
                    $errors['file'] = "Allowed file formats .mp3, .mp4 and .avi.";           
            if ($_FILES["file"]["size"] > 2097152) 
                    $errors['file'] = "File is too large. File size should be less than 2 megabytes.";

            if (empty($errors)) {

             if (!file_exists($target_file)) {

               if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
  

                 $sql = "INSERT INTO video
                          SET 
                            video=:video,nom=:nom,description=:description,date=:dat";


                 $stmt = Database::getInstance()
                         ->getDb()
                         ->prepare($sql);
                 $stmt->bindParam(":video",$target_file);
                 $stmt->bindParam(":nom", $nom);
                 $stmt->bindParam(":description", $description);
                 $stmt->bindParam(":dat", $date);
                 $stmt->execute();
                
                }
                echo $target_file;

              }else{
              	echo '<font color="red">' ."Video already exists.". '</font>';
              }
          }else{
                echo '<font color="red">' ."Video extension is not correct or file is too large.". '</font>';

          }
          
         }

      ?>



    
<div class="form">
    <form name="env" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Video Name" required/>
        <input type="date" name="date" placeholder="Date Video Whas Happend">
        <input type="text" name="descript" placeholder="Description" required/>
        <input type="file" name="file" required/>
        <button>Send Media</button>
    </form>
</div>



<?php include 'include/footer.php'; ?>
