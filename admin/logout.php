<?php 
session_start();

session_destroy();
header( "Location: /asw/admin/index.php" );
die();



?>