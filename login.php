<?php

use function PHPUnit\Framework\isEmpty;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // e caso a variavel submit esteja assignada
    $missing;
    $loginError;

    // se foi post e  a var login está posta foi uma tentativa de login
    if(isset($_POST['login'])){
      // se o login e password foram assignados
       if(isset($_POST['email']) && isset($_POST['password'])){
          $email = htmlspecialchars($_POST['email']);
          $email = strip_tags($email);

          $password = md5($_POST['password']);
          
          $login = loginUser($email,$password);
              if($login){
                 session_start();
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
    <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="./img/volunteer.png" class="img-fluid" alt="voluntariado">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="" method="POST">
        <?php if (isset($loginError)){ echo "
  <p>Dados de Login Inválidos</p>";}
 ?>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="email" class="form-control form-control-lg" />
            <label class="form-label"  for="email">Endereço Email</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control form-control-lg" />
            <label class="form-label" name="password" for="password">Password</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
                checked
              />
              <label class="form-check-label" for="form1Example3"> Lembrar-me </label>
            </div>
            <a href="#!">Esqueceu a password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Entrar</button>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted ">OU</p>
          </div>

          <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="./index.php?page=registerInst" role="button">
            Registar Instituição
          </a>
          <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="./index.php?page=register" role="button">
           Registar Voluntário</a>

        </form>
      </div>
    </div>
  </div>
    </article>
</body>
