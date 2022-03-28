<?php 
session_start();

session_destroy();
header( "Location: /~asw09/ASW-Projeto/admin/index.php" );
die();



?>