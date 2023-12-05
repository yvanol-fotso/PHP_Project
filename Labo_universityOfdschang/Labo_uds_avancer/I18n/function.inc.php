<?php 

   // $Directory ="base/lang";
   $Directory ="I18n/lang";


   $pointeur = opendir($Directory) or die('Erreur');

   $i=0;


   while ($fichier = readdir($pointeur)) {
   	# code...

   	if (($fichier != '.') && ($fichier != '..') && ($fichier != '.DS_Store') ){
   		# code...
   		 	$FichierArray[$i] =$fichier;
   		 	$i++;
   	}

   }





   if ($FichierArray[0] == NULL) {
   	# code...
   	echo "";

   }else{
   	sort($FichierArray,SORT_LOCALE_STRING);
   }



    $lANG_DECTECT = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,2);

    for($k = 0 ;$k<$i;$k++){
    	if ($lANG_DECTECT == substr($FichierArray[$k], 0,2)) {
    		# code...
    		$lANG_DECTECT = substr($FichierArray[$k], 0,2);
    		break;
    	}else{
    		$lANG_DECTECT = 'fr';
    	}
    }




    // if (!$_GET['l'] ) { //sa marchemais ssa met le message d'erreurs surle param l
    if (!isset($_GET['l']) ) {

    	# code...

      // include 'base/lang/'.$_GET['l'].'php';
      
    	include 'lang/'.$lANG_DECTECT.'.php';

    	$_GET['l'] = $lANG_DECTECT;

    	$_SESSION['lang'] = $lang;

    	$_SESSION['lang_SHORT'] = $lang_SHORT;
    }



    if ($_GET['l'] != NULL) {
    	# code...

    	// include 'base/lang/'.$_GET['l'].'php';
      include 'lang/'.$_GET['l'].'.php';


    	$_SESSION['lang'] = $lang;
    	$_SESSION['lang_SHORT'] = $lang_SHORT;

    }




 ?>


