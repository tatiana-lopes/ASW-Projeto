<?php
define('DB_SERVIDOR','localhost');
define('DB_NOME', 'asw09');
define('DB_USUARIO', 'asw09');
define('DB_PASSWORD','aswgrupo09');
function getConnection(){

    $conn = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_PASSWORD, DB_NOME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      return $conn;
    
  }
  
function getFreguesias(){
$conn = getConnection();
$query = "SELECT * FROM Freguesia";
$result = mysqli_query($conn,$query);

  $data[]= mysqli_fetch_assoc($result);
  
  if (mysqli_num_rows($result) > 0) {
    $column = array();
    foreach($result as $key => $value){
      $column[$key] = $value;
    }


  } else {
    echo "0 results";
  }

mysqli_close($conn);
return $data;
}

function getFreguesiaById($idConc,$idFreg){   // VERIFICAR se esta correto

  $conn = getConnection();
  $query = "SELECT nome FROM Freguesia WHERE cod_conselho ={$idConc} AND cod_freguesia = {$idFreg} ";
  $result = mysqli_query($conn,$query);
  
    $data = null;
    
    if (mysqli_num_rows($result) > 0) {
    $data=mysqli_fetch_field($result);
  
  
    }
  
  mysqli_close($conn);
  return $data;

}

function getConcelhoById($id){

  $conn = getConnection();
  $query = "SELECT nome FROM Concelho WHERE cod_conselho ={$id}";
  $result = mysqli_query($conn,$query);
  
    $data = null;
    
    if (mysqli_num_rows($result) > 0) {
    $data=mysqli_fetch_field($result);
  
  
    }
  
  mysqli_close($conn);
  return $data;

}

function getDistritoById($id){

  $conn = getConnection();
  $query = "SELECT * FROM Freguesia";
  $result = mysqli_query($conn,$query);
  
    $data[]= mysqli_fetch_assoc($result);
    
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach($result as $key => $value){
        $column[$key] = $value;
      }
  
  
    } else {
      echo "0 results";
    }
  
  mysqli_close($conn);
  return $data;


}

function getConcelhos(){
  $conn = getConnection();
  $query = "SELECT * FROM Concelho";;
  $result = mysqli_query($conn,$query);
  
  
  if (mysqli_num_rows($result) > 0) {
    $column = array();
    foreach($result as $key => $value){
      $column[$key] = $value;
    }


  } else {
    echo "0 results";
  }
mysqli_close($conn);
return $column;
  }

  
function getAllUsers(){
  $conn = getConnection();
  $query = "SELECT * FROM Utilizador";;
  $result = mysqli_query($conn,$query);
  
  
  if (mysqli_num_rows($result) > 0) {
    $column = mysqli_fetch_assoc($result);
  } else {
    echo "0 results";
  }
mysqli_close($conn);
return $column;
  }

  
function getAllVolunters(){
  $conn = getConnection();
  $query = "SELECT * FROM Voluntarios";;
  $result = mysqli_query($conn,$query);
  
  
  if (mysqli_num_rows($result) > 0) {
    $column = array();
    foreach($result as $key => $value){
      $column[$key] = $value;
    }


  } else {
    echo "0 results";
  }
mysqli_close($conn);
return $column;
  }


  function getAllInstitutions(){
    $conn = getConnection();
    $query = "SELECT * FROM Instituicao";;
    $result = mysqli_query($conn,$query);
    
    
    if (mysqli_num_rows($result) > 0) {
      $column = array();
      foreach($result as $key => $value){
        $column[$key] = $value;
      }
  
  
    } else {
      echo "0 results";
    }
  mysqli_close($conn);
  return $column;
    }

    
function getVoluntario($id){
  $conn = getConnection();
  $query = "SELECT * FROM Concelho";;
  $result = mysqli_query($conn,$query);
  
  
  if (mysqli_num_rows($result) > 0) {
    $column = array();
    foreach($result as $key => $value){
      $column[$key] = $value;
    }


  } else {
    echo "0 results";
  }
mysqli_close($conn);
return $column;
  }
  
function getInstitution($id){
  $conn = getConnection();
  $query = "SELECT * FROM Concelho";;
  $result = mysqli_query($conn,$query);
  
  
  if (mysqli_num_rows($result) > 0) {
    $column = array();
    foreach($result as $key => $value){
      $column[$key] = $value;
    }


  } else {
    echo "0 results";
  }
mysqli_close($conn);
return $column;
  }

  
function getDonationByInstitute($id){
  $conn = getConnection();
  $query = "SELECT * FROM Instituicao WHERE id_U = ". $id ;
  $result = mysqli_query($conn,$query);
  
  
  if (mysqli_num_rows($result) > 0) {
    $column = array();
    foreach($result as $key => $value){
      $column[$key] = $value;
    }


  } else {
    echo "N??o existe Institui????o com id". $id;
  }
mysqli_close($conn);
return $column;
  }

      function userExistsByEmail($email){
        $conn = getConnection();
        $query = "SELECT * FROM Usuarios WHERE Usuarios.email = ".$email ; // verificar query

        $result = mysqli_query($conn,$query);
        mysqli_close($conn);
        if (mysqli_num_rows($result) > 0) {
         return 0;
          }else{
           return 1;
          }

      }
      function userExistsByCondC($conducao){
        $conn = getConnection();
        $query = "SELECT * FROM Voluntario WHERE Voluntario.conducao = ".$conducao ;  // verificar query

        $result = mysqli_query($conn,$query);
        mysqli_close($conn);
        if (mysqli_num_rows($result) > 0) {
         return 0;
          }else{
           return 1;
          }


      }
      
?>