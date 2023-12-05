<?php 
    Session_start();
 ?>


<?php 
 include 'include/header.php';  
?>

<head>
    <link rel="icon" type="image/jpg" href="asset/img/LOGO.jpg" />
	<link rel="stylesheet" href="asset/css/styleHome.css" />
</head>


<body>
	<div class="sucess">
		<h1>Bienvenue  Mr 
            <?php 

              if (!isset($_SESSION['username'] )){
            	   header('Location:home.php');
               }else{
               	 echo $_SESSION['username']; 
               }	   
            ?>
        !</h1>
             
		<ul>
		<!-- <a href="add_user.php">Add user</a> |  -->
		<a href="">Server Acces</a> | 
		<a href="contact_us.php">Contact Us</a> | 
		<a href="delete_user.php">Delete user</a> | 
		<a href="deconnexion.php">Déconnexion</a>
		</ul>

		<ul>
		<a href="add_even.php">Add Evenement Futur</a> | 
		<a href="delete_even.php">Delete Evenement Futur</a>|
		<a href="add_evenPass.php">Add Evenement Passee</a> | 
		<a href="delete_evenPass.php">Delete Evenement Passee</a>|
		<a href="add_video.php">Add video</a> | 
		<a href="delete_video.php">Delete Video</a>|
		<a href="add_gallery.php">Add Image-Gallery</a> | 
		<a href="delete_gallery.php">Delete Image-Gallery</a>
		</ul>	

		<ul>
		<a href="add_partenaireUniversity.php">Add Partenaire University</a> | 
		<a href="delete_partenaireUniversity.php">Delete Partenaire university</a>|
		<a href="add_document.php">Add Document</a> | 
		<a href="delete_document.php">Delete Document</a>|
		<a href="add_collaborateurs.php">Add Partenaire Collaborator</a> | 
		<a href="delete_partern_collab.php">Delete Partenaire Collaborator</a>|
		</ul>	
	</div>




<?php include 'include/footer.php'; ?>
