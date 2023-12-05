<?php 
  include 'include/header.php'; 
  include 'Class/Database/Database.php';
 ?>


<head>
	<title>add_gallery</title>
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

	 <h2> Add Gallery</h2>
     <a href="home.php" class="back">Back To Admin Space</a>

     <?php 
        if ($_FILES && $_POST) {
            
            $nom = $_POST['name'];
            // $image =  $_FILES["image"]["name"];

            $date = $_POST['date'];

            $description = $_POST['descript'];


            // Set image placement folder
            $target_dir = "upload/gallery/";
            // Get file path here i concat the name of user with the name of his image
            $target_file = $target_dir .$_POST['name']. basename($_FILES["image"]["name"]);

            // Get file extension
            $imgExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Allowed file types
            $allowd_file_ext = array("jpg", "jpeg", "png");
            // Get file extension
            $imgExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Allowed file types
            $allowd_file_ext = array("jpg", "jpeg", "png");

            $errors = array();

            if (!in_array($imgExt, $allowd_file_ext)) 
                    $errors['file'] = "Allowed file formats .jpg, .jpeg and .png.";           
            if ($_FILES["image"]["size"] > 2097152) 
                    $errors['file'] = "File is too large. File size should be less than 2 megabytes.";

            if (empty($errors)) {

               if (!file_exists($target_file)) {

                 if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
  

                 $sql = "INSERT INTO  gallery
                          SET 
                            nom=:nom,image=:image, description=:description,date=:dat";


                 $stmt = Database::getInstance()
                         ->getDb()
                         ->prepare($sql);
                 $stmt->bindParam(":nom", $nom);
                 $stmt->bindParam(":image",$target_file);
                 $stmt->bindParam(":description", $description);
                 $stmt->bindParam(":dat", $date);
                 $stmt->execute();
                
                }
                echo $target_file;

              }else{
                echo '<font color="red">' ."Gallery already exists.". '</font>';
               
              }
            }else{
                echo '<font color="red">' ."Image extension is not correct or file is too large.". '</font>';

          }  

        }
    
      ?>


<div class="form">
    <form name="env" method="post" enctype="multipart/form-data">
        
        <input type="text" name="name" placeholder="Name" required/>
        <input type="date" name="date" placeholder="Date Image Whas Happend">
        <input type="text" name="descript" placeholder="Description" required/>
        <input type="file" name="image" required/>
        <button>Send Image</button>
    </form>
</div>



<?php include 'include/footer.php'; ?>
