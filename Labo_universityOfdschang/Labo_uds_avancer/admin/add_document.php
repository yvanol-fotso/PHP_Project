<?php 
  include 'include/header.php'; 
  include 'Class/Database/Database.php';
 ?>

<head>
	<title>add_document</title>
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

	 <h2> Add Document</h2>
     <a href="home.php" class="back">Back To Admin Space</a>


     <?php 
             
        if ($_FILES && $_POST) {

            $nom = $_POST['name'];
            // $image =  $_FILES["image"]["name"];
            $description = $_POST['descript'];


            // Set image placement folder
            $target_dir = "upload/document/";
            // Get file path here i concat the name of user with the name of his image
            $target_file = $target_dir .$_POST['name']. basename($_FILES["file"]["name"]);
            // Get file extension
            $docExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Allowed file types
            $allowd_file_ext = array("pdf", "doc", "docx");

            if (!in_array($docExt, $allowd_file_ext)) 
                   echo "Allowed file formats .pdf, .doc and .docx.";           
            else if ($_FILES["video"]["size"] > 2097152) 
                    echo "File is too large. File size should be less than 2 megabytes.";


             if (!file_exists($target_file)) {

               if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
  

                 $sql = "INSERT INTO document
                          SET 
                            file=:file,nom=:nom,description=:description";


                 $stmt = Database::getInstance()
                         ->getDb()
                         ->prepare($sql);
                 $stmt->bindParam(":file",$target_file);
                 $stmt->bindParam(":nom", $nom);
                 $stmt->bindParam(":description", $description);
                 $stmt->execute();
                
                }
                echo $target_file;

              }else{
              	echo '<font color="red">' ."Document already exists.". '</font>';
              }

         }

      ?>


<div class="form">
    <form name="env" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="File Name" required/>
        <input type="text" name="descript" placeholder="Description Du Document" required/>
        <input type="file" name="file" required/>
        <button>Send File</button>
    </form>
</div>





<?php include 'include/footer.php'; ?>
