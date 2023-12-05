<?php 

    $fichier = $_GET['url'];
      

    $file = array_pop(explode('/', $fichier));

    header('Content-Type:application/pdf');
    header('Content-Type:application/txt');
    header('Content-Type:application/word');
    header('Content-Disposition:attachment;filename="nom.pdf" ');

    readfile($file);
    // $pdf =  file_put_contents($temp, file_get_contents($fichier));

    // echo $pdf;
    
 ?>