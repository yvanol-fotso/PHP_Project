<?php
require_once('class/Database.php');


// fonction de base
    
//   info propre au user
   function getUserInfo($id) {
        $query = "SELECT * FROM user WHERE id_user = :id";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


// info propre avec liste de ses articles publier
     function getUserDetails($id) {
        $query = "SELECT *, date_format(join_time, '%D %b %Y, %I:%i %p') as join_date  FROM user, address WHERE user._id = :id AND user.address_id = address._id";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    function userExists($id, $method) {
        $query = "SELECT id_user FROM user WHERE email = :method";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);

        $stmt->bindParam(":method", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0)

            return $stmt->fetchColumn();
        else
            return 0;
    }

     function updateStatus($id)
    {
         $newstatus = "Actif";

         $query = "UPDATE user SET status=:status WHERE id_user = :value";

         $stmt = Database::getInstance()
                   ->getDb()
                   ->prepare($query);
         $stmt->bindParam(":status", $newstatus);
         $stmt->bindParam(":value", $id);
         $stmt->execute();
         return true;
    }

    
    function doesUserExist($id) {
        $_id = userExists($id, "nom");
        return $_id>0?$_id:userExists($id, "email");
    }


    function verifyPassword($password1 ,$password2)
     {
         # code...
        $chiffrePass1 = md5($password1);
        if (strcmp( $chiffrePass1, $password2) == 0) {
            return true;
        }

        return false;
     }
    
    function verifyUser($id, $password) {
        $query = "SELECT password FROM user WHERE id_user = :id";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
            
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
             
             // password_verify() ne fonctionne plus
            // return password_verify($password, $user['password'])?true:false;
            if (verifyPassword($password,$user['password'])) {
                return true;
            }

        }

        return false;
    }

    

    
    
    function insertUser($userArray,$userAvatar) {
        $fields = ['nom', 'prenom', 'email','authtoken','password','image'];

        $query = 'INSERT INTO user(' . implode(',', $fields) . ') VALUES(:' . implode(',:', $fields) . ')';

        $db = Database::getInstance()->getDb();
        $stmt = $db->prepare($query);

        $prepared_array = array();
        foreach ($fields as $field) {
            $prepared_array[':'.$field] = @$userArray[$field];
        }
        // $prepared_array[':password'] = password_hash($userArray['password'], PASSWORD_BCRYPT);//le decryptage ne fonctionne pas
        $prepared_array[':password'] = md5($userArray['password']);
        $prepared_array[':authtoken'] = md5($userArray['email']);
        $prepared_array[':image'] = @$userArray['nom'].@$userAvatar['image']['name'];  //je concact le name du user a son avatar
        try {
            $db->beginTransaction();
            $stmt->execute($prepared_array);

            $id = $db->lastInsertId();
            $db->commit();

            $_SESSION['email'] = $prepared_array[':email'];
        } catch (PDOException $ex) {
            $db->rollBack();
            return $ex->getMessage();
        }

        return $id;
    }

// fin des fonctions de bases


// fonction pour definire le status par defaut de la notification d'un user
function defaultNotification($email)
{
    # code...

    $mail = $email;

    $statusValue = 0;
   
    $query = "INSERT INTO subcribeNotification 
              SET status=:new ,email_user=:mail";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
    $stmt->bindParam(":new", $statusValue);
    $stmt->bindParam(":mail", $mail);
    $stmt->execute();
    $stmt->fetch();
}



// fonction propre du l'inscription et connexion des user utilisant nos fonctions de base
    
    function verify() {
        
        $errors = array();      
        $defaults = [
            'nom' => 'First Name',
            'prenom' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'password_two' => 'Repeat Password',
        ];

        $required = ['nom', 'prenom', 'email',
             'password', 'password_two',
             ];

         // Set image placement folder
         $target_dir = "profile_dir/";
         // Get file path here i concat the name of user with the name of his image
         $target_file = $target_dir .$_POST['nom']. basename($_FILES["image"]["name"]);
         // Get file extension
         $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         // Allowed file types
         $allowd_file_ext = array("jpg", "jpeg", "png");
              


        foreach ($required as $field) {
            if (!isset($_POST[$field])  || strlen($_POST[$field]) == 0)
                $errors[] = $defaults[$field] . ' is required!';
            else
                $values[$field] = $_POST[$field];
        }


        if(count($errors) == 0) {
            if($_POST['password'] != $_POST['password_two'])
                $errors['password'] = 'Passwords do not match!';
            else if(strlen($_POST['password']) < 6)
                $errors['password'] = 'Password length must be greater than 6!';
            // else if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['email']))
            //     $errors[] = 'Email don\'t respect syntax';        
            else if(!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
                $errors['email'] = 'Email is not correct';                  
            else if(strlen($_POST['nom']) < 4 )
                $errors['nom'] = 'Name must be more than 3 characters! Or can\'t ';
            else if(strlen($_POST['prenom']) < 4 )
                $errors['prenom'] = 'Username must be more than 3 characters!';
     
            else if (!file_exists($_FILES["image"]["tmp_name"])) 
                $errors['file']= "Select image to upload.";
            else if (!in_array($imageExt, $allowd_file_ext)) 
                $errors['file'] = "Allowed file formats .jpg, .jpeg and .png.";           
            else if ($_FILES["image"]["size"] > 2097152) 
                     $errors['file'] = "File is too large. File size should be less than 2 megabytes.";
            else if (file_exists($target_file)) 
                     $errors['file'] = "File already exists.";
            else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // $errors['succes'] = 'succes';
                }
            }
        }

        if(count($errors) == 0) {
            $result = insertUser($_POST,$_FILES);
            
            if(is_int($result) && $result != 0){
                $success = "Successfully registered!";
            }else if(is_int($result) && $result == 0){
                $errors[] = "An Error Occurred!";
            }else {
                if(strstr($result, '23000') && strstr($result, 'email'))
                    $errors[] = 'User with this email already exists!';
                else if(strstr($result, '23000') && strstr($result, 'nom'))
                    $errors[] = 'Username is already registered!';
                else {
                    $success = "Successfully registered!";

                    return $result;

                }
            }
        }


        return $errors;
    }





    function connexionOk(){
        $errors = array();

        $required = ['email',  'password'];

        foreach ($required as $field) {
            if (!isset($_POST[$field]) || strlen($_POST[$field]) == 0)
                $errors[] = $field . ' is required!';
            else
                $values[$field] = $_POST[$field];
        }

        if(count($errors) == 0) {
            
            if(strlen($_POST['password']) < 6)
                $errors['password'] = 'Password length must be greater than 6!';       
            else if(!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
                $errors['email'] = 'Email is not correct';             
        }


        if(count($errors) == 0) {
            $id = doesUserExist($_POST['email']);
            if ($id == 0) {
                $errors['email'] = 'User does not exist! Please register first!';
            } else if(!verifyUser($id, $_POST['password'])) {
                $errors['password'] = 'Wrong Password!';
            } else {
                updateStatus($id);
                
                $_SESSION['id'] = $_POST['email'];
                
                $success = "Successfully logged in!";

                 // sont status dans la table notification est inactif
                defaultNotification($_SESSION['id']);

                return $id;
            }
        }

        return $errors;
    }
        
            
   

   //fonction d'edition du profile   




// difnition des fonction de base

 function verifyEmail($email)
{
    $sqlQuery = "SELECT * FROM user WHERE email=:email";

    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sqlQuery);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return true;
    }

    return  false;
}



function udapteUserInfo($email,$nom,$prenom,$image)
{
    $sqlQuery = "UPDATE user SET nom =:nom, prenom=:prenom, image=:image WHERE email=:email" or die("Erreur lors de la mise à jour des infos");
    $stmt = Database::getInstance()
            ->getDb()
            ->prepare($sqlQuery);
    $stmt->bindParam(":email", $email);        
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":image", $image);
    $stmt->execute();

    return true;
}





// modification des informations proprement dit du user
function verifyNewProfil()
{
        $errors = array();


        $email = $_POST['usermailValue'];
        $nom =  $_POST['new-name'];
        $prenom = $_POST['new-prenom'];
        // $image = $_FILES['avatar'];

         // Set image placement folder
         $target_dir = "profile_dir/";
         // Get file path here i concat the name of user with the name of his image
         $target_file = $target_dir .$_POST['new-name']. basename($_FILES["avatar"]["name"]);
         // Get file extension
         $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         // Allowed file types
         $allowd_file_ext = array("jpg", "jpeg", "png"); 

         // je renomme l'image
         $image = $_POST['new-name']. basename($_FILES["avatar"]["name"]);          
        

         // verification si cette email existe
        $resul = verifyEmail($email);

        if(!filter_var($email,FILTER_VALIDATE_EMAIL))   
                $errors['email'] = 'Email non Valide';
        else if(!$resul)
                $errors['notExist'] = "User WHo have this Email doesn't Exist!! Please Register aifain";
        else if(strlen($_POST['new-name']) < 4 )
                $errors['nom'] = 'Name must be more than 3 characters! Or can\'t ';
        else if(strlen($_POST['new-prenom']) < 4 )
                $errors['prenom'] = 'Username must be more than 3 characters!';
        else if (!file_exists($_FILES["avatar"]["tmp_name"])) 
                $errors['file']= "Select image to upload.";
        else if (!in_array($imageExt, $allowd_file_ext)) 
                $errors['file'] = "Allowed file formats .jpg, .jpeg and .png.";           
        else if ($_FILES["avatar"]["size"] > 2097152) 
                     $errors['file'] = "File is too large. File size should be less than 2 megabytes.";
        else if (file_exists($target_file)) 
                     $errors['file'] = "File already exists.";
        else {
                // if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                //     // $errors['succes'] = 'succes';
                // }
               echo TRUE; //pour sortir et eviter de mettre la variable $error a non vide on fait ce echo
            } 

       
       if (count($errors) == 0 ) {
           
                $succes = udapteUserInfo($email,$nom,$prenom,$image);

                 if ($succes) {

                     move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                     $errors['succes'] = "Succeffully Udapte Information For Your";
                     $_SESSION['id'] = $email;

                    // return true;
                     return $errors;
                 }
            
        }else{
        
           $errors['champ'] = 'Un ou Plusieurs Champs Sont Vide';
        }
     
      return $errors;
// echo json_encode($errors);
}





