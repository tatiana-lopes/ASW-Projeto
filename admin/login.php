<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // e caso a variavel submit esteja assignada
    $missing= array();
    $loginError;
    $loginState =False;

    // se foi post e  a var login está posta foi uma tentativa de login
    if(isset($_POST['login'])){
      // se o login e password foram assignados
       if(isset($_POST['username']) && isset($_POST['password'])){
          $user = htmlspecialchars($_POST['username']);
          $user = strip_tags($user);

          $password = md5($_POST['password']);
          
          $login = loginAdmin($user,$password);
              if($login){
                 
                 header('Location: index.php');
                 
            /// redirecionar para outra pagina, temos de arranjar forma de permanecer com login
               
              }else{
                 $loginError =TRUE;

             }
        }else{
          $loginError =TRUE;
        
        }



  

    }
  




  }


?>
    
    <article class="row mt-5">
    <div class="col ml-5">
        
    <h1>Index</h1>
    <?php echo print_r($_POST); ?>
        <?php echo print_r($_SESSION);?> 
    echo "<br>";
    echo "\n";?>
    
    
   
    <form action="#" id="loginUser"method="POST">
        <?php if (isset($loginError)){ echo "
  <p>Dados de Login Inválidos</p>";}
 ?>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label"  for="username">Nome de Usuário</label>
            <input type="text" name="username" id="username" class="form-control form-control-lg" />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4"> 
            <label class="form-label" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control form-control-lg" />
           
          </div>

          <!-- Submit button -->
          <button type="submit" form="loginUser" name="login" class="btn btn-primary btn-lg btn-block">Entrar</button>


        </form>
    </div>
    </article>
</body>
