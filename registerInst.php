<?php
require_once 'functions/database.php';
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
<div class="row justify-content-center">
    
<form action="" name="registro" id="registro" method="POST">



<div class="input-group mb-3">
    
<label for="nome">Nome:
    <?php if (in_array('name', $missing)) 
        echo " Nome em falta";?>
</label>
<input type="text" class="form-control sm" id="nome" name="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>">

<label for="email">Email
<?php if (in_array('name', $missing)) 
        echo " Nome em falta";?>
</label>

</label>
<input type="text"  class="" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
</div>
<div class="form-group">
<label for="password">Password: 
    <?php if (in_array('password', $missing)) 
        echo "  Password em Falta";?>
</label>
<input type="number"  class="" id="password" name="password">


<label for="password2">Repita a Password: 
    <?php if (in_array('password2', $missing)) 
        echo " Password em Falta";?>
</label>
<input type="number"  class="" id="password" name="password2">

</div>
<div class="form-group">
<label for="tel">Telefone: 
    <?php if (in_array('tel', $missing)) 
        echo " Telefone em falta";?>
</label>
<input type="number"  class="" id="tel" name="tel" value="<?php if(isset($_POST['tel'])) echo $_POST['tel'] ?>">


<label for="morada">Morada
<?php if (in_array('morada', $missing)) 
        echo " Nome em falta";?>

</label>

<input type="text"  class="" id="morada" name="morada" value="<?php if(isset($_POST['morada'])) echo $_POST['morada'] ?>">
</div>
<div class="form-group">
<select name="Distrito">
    <?php


       ?>
</select>


<select name="concelho">
<?php
    
    $concelho = getConcelhos();
    if($concelho > 0 ){
        foreach($concelho as $valor ){
            echo "<option value" . $valor['codigo'] . ">". $valor['nome'] . "</option>" ; 
        }
     
       
   
    }
    ?>
</select>

<select name="freguesia">
   <?php
    
 $freguesia = getFreguesias();
 if($freguesia > 0 ){
     foreach($freguesia as $valor ){
         echo "<option value" . $valor['codigo'] . ">". $valor['nome'] . "</option>" ; 
     }
  
    

 }
 ?>
</select>
</div>
<div class="form-group">

<label for="description"></label>
<textarea name="description" cols="20" row="4" value="<?php if(isset($_POST['description'])) echo $_POST['description'] ?>" > Breve descrição sobre a sua Instituição
</textarea>

<label for="nomeR">Nome Responsavel:
    <?php if (in_array('name', $missing)) 
        echo " Nome em falta";?>
</label>
<input type="text" class="" id="nomeR" name="nomeR" value="<?php if(isset($_POST['nomeR'])) echo $_POST['nomeR'] ?>">

<label for="contatoR">Contacto Responsavel:
    <?php if (in_array('name', $missing)) 
        echo " Contacto em falta";?>
</label>
<input type="number" class="" id="contatoR" name="contatoR" value="<?php if(isset($_POST['contatoR'])) echo $_POST['contatoR'] ?>">
</div>

</form>
<div class="form-group">
<button type="submit" form="registro" name="submit" value="submit">Registar</button>
</div>
</div>






</article>