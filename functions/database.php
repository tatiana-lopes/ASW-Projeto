<?php
define('DB_SERVIDOR','localhost');
define('DB_NOME', 'FCULREFOOD');
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
    echo "Não existe Instituição com id". $id;
  }
mysqli_close($conn);
return $column;
  }

  
function RegisterVoluntario($dados ){  // POR O RESTO DOS DADOS NECESSARIOS
  $conn = getConnection();
  $query = "ISERT INTO Concelho"; // VAI TER DE SER UM INSERT COM OS DADOS RECEBIDOS

  $query += "values(?????????????) " . $dados['name'] . $dados['password'] . $dados['cc']; 
  

  


  }   
  
  // SE OCORREU COM SUCESSO VAMOS TER QUE DEVOLVER UM TRUE OU FALSE
  function RegisterInstitution($username,$password ){  // POR O RESTO DOS DADOS NECESSARIOS
    $conn = getConnection();
    $query = "INSET INTO * FROM Concelho"; // VAI TER DE SER UM INSERT COM OS DADOS RECEBIDOS
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
    }   // SE OCORREU COM SUCESSO VAMOS TER QUE DEVOLVER UM TRUE OU FALSE
  
    function addDonation($idInstitute,$name ){  // POR O RESTO DOS DADOS NECESSARIOS
      $conn = getConnection();
      $query = "SELECT * FROM Concelho"; // VAI TER DE SER UM INSERT COM OS DADOS RECEBIDOS
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
      }   // SE OCORREU COM SUCESSO VAMOS TER QUE DEVOLVER UM TRUE OU FALSE
    

      function loginUser($username, $password){
        $conn = getConnection();
        $query = "SELECT * FROM Usuarios WHERE Usuarios.email = ".$username ;

        $result = mysqli_query($conn,$query);
        $user = mysqli_fetch_assoc($result);
        if($user['email'] == $username && $user['password']== $password){
          return $user['id'];
        }else{
          return NULL;
        }

        

      }
?>