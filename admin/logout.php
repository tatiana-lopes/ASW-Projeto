<?php 
if(isset($_SESSION)){

  session_destroy();

  echo "<script> window.location.replace(\"http://www.w3schools.com\"); </script>";
  
  // The below code does not get executed 
  // while redirecting
  exit;
}


?>