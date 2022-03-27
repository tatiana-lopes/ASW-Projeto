<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$tipo_Registro;
$erros = array();
$missing = array();
$errorMsg = array();


//Caso tenha sido feito um pedido Post
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // e caso a variavel submit esteja assignada
    if(isset($_POST['submit'])){

   // e caso a variavel name não esteja assignada
    if(empty($_POST['nome'])){
    array_push($missing, 'nome');    
    
    }   
      // e caso a variavel passwor não  esteja assignada
    if(empty($_POST['password'])){
    array_push($missing ,"password");
    }
      // e caso a variavel password2 não esteja assignada
    if(empty($_POST['password2'])){
        array_push($missing ,"password2");
   }   
     // e caso a variavel morada não esteja assignada
    if(empty($_POST['morada'])){
       array_push($missing ,"morada");
    }
     // e caso a variavel tel não esteja assignada
    if(empty($_POST['tel'])){
        array_push($missing ,"tel");
    } 
       // e caso a variavel nomeR não esteja assignada
    if(empty($_POST['nomeR'])){
        array_push($missing ,"nomeR");
    }
       // e caso a variavel contatoR não esteja assignada
    if(empty($_POST['contatoR'])){
        array_push($missing ,"contatoR");
    }
    if(empty($_POST['description'])){
        array_push($missing ,"contatoR");
    }
    
    // se não houver erros ou valores vazios
    if(!empty($missing) && !empty($erros)){
    $dados = array();
    //para cada valor do pos tratar e adicionar a uma array associativa
    foreach($_POST as $key =>$value){
     $valor = htmlspecialchars($value);
     $valor = stripcslashes($valor);
     array_push($dados[$key],$valor);
    }
    // fazer chamada a função para registar
    $result = RegisterVoluntario($dados);
        if($result){
            //caso o resultado seja positivo ir para o index
             header('Location: index.php');
                 die();

          }else{
              //caso contrario adicionar a array erros
        $erros['submit'] = TRUE;

        }
    

    }
    




    }
}



?>


<article >
    <br>
    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>





</article>