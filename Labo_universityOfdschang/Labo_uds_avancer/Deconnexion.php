<?php
require_once('class/Database.php');

	session_start();

	$mail = $_SESSION['id'];
  updateStatusOff($mail);
	 
	session_destroy();
	header("location:index.php");







function updateStatusOff($mail)
  {
    $newstatus = "Non Actif";

    $query = "UPDATE user SET status=:status WHERE email = :value";

    $stmt = Database::getInstance()
              ->getDb()
              ->prepare($query);
    $stmt->bindParam(":status", $newstatus);
    $stmt->bindParam(":value", $mail);
    $stmt->execute();
    return true;
      

}

?>
