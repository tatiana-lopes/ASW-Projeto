<?php
include './function.php';

if(loginAdmin('admin',md5('aswgrupo09'))){

    echo "<p> valido </p>";
}

echo password_hash($password, PASSWORD_BCRYPT);




?>