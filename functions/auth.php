<?php  // funções relacionadas com o login  System


function loginUser($email, $password){
    $conn = getConnection();
    $query = "SELECT * FROM Utilizador WHERE Utilizador.email = '{$email}'";
    $result = mysqli_query($conn,$query);
    $loginState= false;
    if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }  
       if(password_verify($password, $user['pass'])){

     
        $_SESSION['tipo'] = $user['tipo'];          
        $_SESSION['user'] = strtok($user['username'], " ");
        $_SESSION['email'] = $user['email'];     
        $_SESSION['id'] = $user['id_U'];
        $_SESSION['logged']= true;
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
    { 
      $conn = getConnection();
      $queryUser = "INSERT INTO Utilizador (email, tipo, telefone, pass, nome, codigo_distrito, codigo_concelho, codigo_freguesia) ";
      $queryUser .= " VALUES ( \"{$dados['email']}\" , \"Voluntario\" , {$dados['tel']} , '{$dados['password']}' , \"{$dados['nome']}\" , {$dados['cod_distrito']} , {$dados['cod_concelho']}, {$dados['cod_freguesia']}); ";
      
     // $queryVoluntario ="INSERT INTO Voluntario (id_U ,cc, carta_conducao, genero, dob)";
     //$queryVoluntario .=  "VALUES (   \"{$dados['cc']}\" ,  \"{$dados['Cconducao']}\" ,   \"{$dados['genero']}\" ,   \"{$dados['dob']}\"  );";
   
      $result = mysqli_query($conn, $queryUser);
      $result2 = mysqli_query($conn, $queryVoluntario);
      $sucess =false;
      if ($result && $result2) {
        echo "Um novo registo inserido com sucesso";
        mysqli_close($conn);
        $sucess = True; 
         mysqli_free_result($result);
         mysqli_free_result($result2);
      } else {
        echo "Erro: insert failed" . $queryUser . "<br>" . mysqli_error($conn);
    
      }  
    
      // mysqli_free_result($result2);
       mysqli_close($conn);
       return   $sucess ;
    }   // SE OCORREU COM SUCESSO VAMOS TER QUE DEVOLVER UM TRUE OU FALSE
    
    
    function RegisterInstitution($dados)
    { 
      $conn = getConnection();
      $queryUser = "INSERT INTO Utilizador (email, tipo, telefone, pass, nome, codigo_distrito, codigo_concelho, codigo_freguesia) ";
      $queryUser .= " VALUES ( \"{$dados['email']}\" , \"Voluntario\" , {$dados['tel']} , '{$dados['password']}' , \"{$dados['nome']}\" , {$dados['cod_distrito']} , {$dados['cod_concelho']}, {$dados['cod_freguesia']}); ";
          // $query .= "INSERT INTO Instituicao (tipo, descricao, morada, n_contacto, nome_contacto) VALUES ( " . $dados['tipo'] . "," . $dados['descricao'] . "," . $dados['morada'] . "," . $dados['contactoR'] . "," . $dados['nomeR'] . ");";
    
      $result = mysqli_query($conn,  $queryUser);
      $sucess =false;
      if ($result) {
        echo "Um novo registo inserido com sucesso";
        mysqli_close($conn);
        $sucess = True;
      } else {
        echo "Erro: insert failed" .  $queryUser . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
        $sucess = False;
      }
       mysqli_free_result($result);
       mysqli_close($conn);
       return   $sucess ;
    }   // SE OCORREU COM SUCESSO VAMOS TER QUE DEVOLVER UM TRUE OU FALSE
    
?>