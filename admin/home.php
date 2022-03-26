<?php
if(checkLogin()==Null){ 
header('Location: index.php');
exit();
}
$user = array();
?>