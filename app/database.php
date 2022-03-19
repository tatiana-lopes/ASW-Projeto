<?php
require_once '../config/dbSettings.php';

function startConnection(){
    $conn = new mysqli($serverName, $userName, $password, $databaseName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      
return $conn;
}

function closeConnection($conn){

    mysqli_close($conn);
}

function query($coon, $query ){




}

?>