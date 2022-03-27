<?php  // funções relacionadas com o login  System


function loginUser($email, $password){
    $conn = getConnection();
    $query = "SELECT * FROM Utilizador WHERE email = '{$email}'";
    $result = mysqli_query($conn,$query);
    $loginState= false;
    if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }  
       if(password_verify($password, $user['password'])){

     
        $_SESSION['tipo'] = $user['tipo'];          
        $_SESSION['user'] = $user['username'];     
        $_SESSION['id'] = $user['admin_id'];
        $_SESSION['logged']= true;
        $login = true;
       }
    }

    return $loginState;
}


function isLoggedInVoluntario(){
    $result =false;
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        $_SESSION = array();
    }  
    if(!empty($_SESSION)){
        if($_SESSION['tipo'] === "Voluntario" && $_SESSION['logged']==TRUE){
         $result = true;
        }
    }
    return $result;
}
function isLoggedInInstitute(){
    $result =false;
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        $_SESSION = array();
    }  
    if(!empty($_SESSION)){
        if($_SESSION['tipo'] === "Instituto" && $_SESSION['logged']==TRUE){
         $result = true;
        }
    }
    }

    function RegisterVoluntario($dados)
    {  // POR O RESTO DOS DADOS NECESSARIOS
      $conn = getConnection();
      $query = "INSERT INTO Utilizador (email, tipo, telefone, pass, nome, codigo_distrito, codigo_concelho, codigo_freguesia) VALUES ( " . $dados['email'] . ", V ," .  $dados['tel'] . "," .  $dados['password'] . "," .  $dados['nome'] . ", " . $dados['c_distrito']  . "," .  $dados['c_concelho'] . "," .  $dados['c_freguesia'] . ");";
      $query .= "INSERT INTO Voluntario (cc, carta_conducao, genero, dob, imgPath) VALUES ( " . $dados['cc'] . "," . $dados['Cconducao'] . "," . $dados['gen'] . "," . $dados['dob'] . "," . $dados['imgPath'] . ");";
    
      $result = mysqli_query($conn, $query);
      $sucess =false;
      if ($result) {
        echo "Um novo registo inserido com sucesso";
        mysqli_close($conn);
        $sucess = True;
      } else {
        echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
    
      }  
       mysqli_free_result($result);
       mysqli_close($conn);
       return   $sucess ;
    }   // SE OCORREU COM SUCESSO VAMOS TER QUE DEVOLVER UM TRUE OU FALSE
    
    
    function RegisterInstitution($dados)
    { 
      $conn = getConnection();
      $query = "INSERT INTO Utilizador (email, tipo, telefone, pass, nome, codigo_distrito, codigo_concelho, codigo_freguesia) VALUES ( " . $dados['email'] . ", I ," .  $dados['tel'] . "," .  $dados['password'] . "," .  $dados['nome'] . ", " . $dados['c_distrito']  . "," .  $dados['c_concelho'] . "," .  $dados['c_freguesia'] . ");";
      $query .= "INSERT INTO Instituicao (tipo, descricao, morada, n_contacto, nome_contacto) VALUES ( " . $dados['tipo'] . "," . $dados['descricao'] . "," . $dados['morada'] . "," . $dados['contactoR'] . "," . $dados['nomeR'] . ");";
    
      $result = mysqli_query($conn, $query);
      $sucess =false;
      if ($result) {
        echo "Um novo registo inserido com sucesso";
        mysqli_close($conn);
        $sucess = True;
      } else {
        echo "Erro: insert failed" . $query . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
        $sucess = False;
      }
       mysqli_free_result($result);
       mysqli_close($conn);
       return   $sucess ;
    }   // SE OCORREU COM SUCESSO VAMOS TER QUE DEVOLVER UM TRUE OU FALSE
    
?>