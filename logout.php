<?php 
session_start();

session_destroy();
header( "Location: /~asw09/ASW-Projeto/index.php" );
die();



?>