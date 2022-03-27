<?php
include "database.php";

function isAdmin(){

}

function loginAdmin($user,$pass){
        $conn = getConnection();
        $query = "SELECT * FROM Admin WHERE username =  \" . $user . \" ";
        $result = mysqli_query($conn,$query);
        $login=false;
        if (mysqli_num_rows($result) > 0) {
                session_start();// caso as passwords sejam iguais , criar uma sessão em que
              $_SESSION['tipo'] = "Admin";          // é declarado um voluntário e é dado o seu nome e id encriptado
              $_SESSION['user'] = $user['username'];      // o id encriptado sera usado para ir a sua pagina de preferencias 
              $_SESSION['id'] = $user['admin_id'];
              $login = true;
            }else{
                return false;
            }
        
        mysqli_close($conn);
        return $login;
    }

    function checkIfAdminExists($id){
        $conn = getConnection();
        $query = "SELECT * FROM Admin WHERE admin_id =  \" . $id . \" ";
        $result = mysqli_query($conn,$query);
        $login=false;
        if (mysqli_num_rows($result) > 0) {
             return true;
            }else{
                return false;
            }
        
        mysqli_close($conn);
       
    }


function isLoggedIn(){
$result =false;
if(isset($_SESSION['id'])){
   $result = checkIfAdminExists($_SESSION['id']);
    

}
return $result;

}


function getUserById($id){
    $conn = getConnection();
    $query = "SELECT * FROM Utilizador WHERE id_U = '{$id}'"; 
    $result = mysqli_query($conn, $query);
  
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;


}

function getUserByName($name){
    $conn = getConnection();
    $query = "SELECT * FROM Utilizador WHERE nome = '{$name}'"; 
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;

}




function getUserbyType($type){

    $conn = getConnection();
    $query = "SELECT * FROM Utilizador where tipo = '{$type}'";
    $result = mysqli_query($conn, $query);
  

    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;

}

function deleteUser($id){

    

}

function editUser($id){


}

function getCountUsers(){

    $conn = getConnection();
    $query = "SELECT COUNT(*) FROM Utilizador";
    $result = mysqli_query($conn, $query);
  

    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
}


function getCountVoluntarios(){
    $conn = getConnection();
    $query = "SELECT COUNT(*) FROM Voluntario";
    $result = mysqli_query($conn, $query);
  

    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
}

function getCountInstitutos(){
    $conn = getConnection();
    $query = "SELECT COUNT(*) FROM Instituicao";
    $result = mysqli_query($conn, $query);
  

    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach ($result as $key => $value) {
        $column[$key] = $value;
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
    return $column;
}



?>