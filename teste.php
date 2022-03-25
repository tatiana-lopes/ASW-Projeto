<?php
include './functions/database.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $freguesia = getFreguesias();
    
      print_r($freguesia);
     
       
   
    
   

   
?>