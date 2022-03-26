<?php
require_once 'functions/database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$erros = array();
$missing = array();



//Caso tenha sido feito um pedido Post
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // e caso a variavel submit esteja assignada
    if(array_key_exists('submit',$_POST)){

   // e caso a variavel name não esteja assignada
    if(empty($_POST['nome'])){
    array_push($missing, 'nome');    
    
    }   
      // e caso a variavel passwor não  esteja assignada
    if(empty($_POST['password'])){
    array_push($missing ,"password");
    }else{
        $pass = md5($_POST['password']);

    }
    if(empty($_POST['password2'])){
        array_push($missing ,"password2");
        }else{
            $passRepetition= md5($_POST['password2']);
    
        }
      // e caso a variavel email não esteja assignada
    if(empty($_POST['email'])){
        array_push($missing ,"email");
   }else{
       $email = htmlspecialchars($_POST['email']);
       $email = stripcslashes($email);
       $checkResult = userExistsByEmail($email);
             if($checkResult){
                   $erros['email']= "Utilizador com email" . $email . " já existe.";
              }
      }   
     // e caso a variavel cc não esteja assignada
    if(empty($_POST['cc'])){
       array_push($missing ,"cc");
    }

    if(empty($_POST['tel'])){
        array_push($missing ,"tel");
     }

     if(empty($_POST['gen'])){
        array_push($missing ,"gen");
     }

     if(empty($_POST['c_distrito'])){
        array_push($missing ,"c_distrito");
     }

     if(empty($_POST['c_concelho'])){
        array_push($missing ,"c_concelho");
     }

     if(empty($_POST['c_freguesia'])){
        array_push($missing ,"c_freguesia");
     }

     if(empty($_POST['imgPath'])){
        array_push($missing ,"imgPath");
     }



     // e caso a variavel Cconducao não esteja assignada
    if(empty($_POST['Cconducao'])){
        array_push($missing ,"Cconducao");
    } else{
        // caso contrario trata a informação e pede a função da database para ver se já existe,
        // caso existe adiciona a array erros;
        $conducao = htmlspecialchars($_POST['Cconducao']);
        $conducao = stripcslashes($conducao);
        $checkResult = userExistsByCondC($conducao);
        if($checkResult){
         $erros['Cconducao']= "Utilizador com email" . $email . " já existe.";
        }
       // e caso a variavel gen não esteja assignada  


    }if(empty($_POST['dob'])){
        array_push($missing ,"dob");
    }else{
       // e caso a variavel gen não esteja assignada

       
    }
    if(isset($pass)&& isset($passRepetition)){
    if($pass !== $passRepetition){
        $erros['pass'] = "Passwords não são identicas";
    }else{
        $_POST['password'] =$pass;
        unset( $_POST['password2']);
    }
}
    // se não houver erros ou valores vazios
    if(empty($missing) && empty($erros)){
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

<article class="form-group container">

<!--  verificar se existem erros ou dados em falta -->

<?php if (count($erros) >0  || count($missing) >0){ echo "
<p class=\"alerta\">Registro Invalido, por favor corrija os dados</p>";}
if(isset($erros['pass'])) echo "<p class=\"alerta\">". $erros['pass'] ."</p>";  // secalhar no futuro metemos um foreach dos erros
echo print_r($missing);
echo "\n";
echo print_r($_POST);


 ?>
<div class="row justify-content-center">


<table style="width:80%" class="">
<form action="" method="POST" id="registro" >




<!--  verificar se esta em falta o nome -->

<tr>
<td>
<label for="nome">Nome:
<?php if (in_array('nome', $missing) ) 
        echo "<span class=\"alerta\" > Introduza Nome*</span>";?>
</label>
<input type="text" class="form-control col-xs-4" name="nome" id="nome" value="" >
</td>
<td style="width:10%"></td>
<td>
<label for="email">Email:
    <?php if (in_array('email', $missing) ) 
        echo "<span class=\"alerta\" > Introduza Email*</span>";?>

</label>
<input type="text"  class="form-control" id="email" name="email" value="">
<span class="help-block"> <?php  // texto de ajuda ou aviso)?> </span>
</td>
</tr>
<tr>

  <td>
<label for="password">Password: 
    <?php if (in_array('password', $missing) ) 
      echo "<span class=\"alerta\" > Password em falta*</span>";?>
</label>    
<input type="password"  class="form-control" name="password" id="password">
  </td>
  <td style="width:10%"></td>
  <td>
<label for="password2">Repita sua Password: 
    <?php if (in_array('password2', $missing) ) 
        echo "<span class=\"alerta\" > Password em falta *</span>";?>
</label>
<input type="password"  class="form-control" name="password2" id="password2">
  </td>
</tr>
<tr>
<td>
<label for="cc">nº Cartão de Cidadão
<?php if (in_array('cc', $missing) ) 
        echo "<span class=\"alerta\" > Em Falta *</span>";?>

</label>
<input type="number"  class="form-control" name="cc" id="cc">  


</td>
<td>

<label for="Cconducao">nº Carta de Condução
<?php if (in_array('Cconducao', $missing) ) 
        echo "<span class=\"alerta\" > Em Falta *</span>";?>

</label>
<input type="number"  class="form-control" name="Cconducao" id="Cconducao">
</td>
<td>
<label for="dob">Data de Nascimento
<?php if (in_array('dob', $missing) ) 
        echo "<span class=\"alerta\" > Em Falta *</span>";?>

</label>
<input type="date" class="form-control" name="dob" id="dob">
</td>
</tr>
<tr>
<td>
<label for="gen">Género</label>
<label for="mas">Masculino</label>
<input type="radio" name="gen" class="" id="mas" value="masculino">
<label for="fem">Feminino</label>
<input type="radio" name="gen" class="" id="fem" value="feminino" >
<label for="out">Outro</label>
<input type="radio" name="gen" class="" id="out" value="outro" >
<?php if (in_array('gen', $missing) ) 
        echo "<span class=\"alerta\" > Escolha o Género*</span>";?>

</td>
<td>
<select name="concelho">
 
    <?php
    
 $freguesia = getConcelhos();
 if($freguesia > 0 ){
     foreach($freguesia as $valor ){
         echo "<option value" . $valor['codigo'] . ">". $valor['nome'] . "</option>" ; 
     }
  
    

 }


?>



</select>
</td>
<td>
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
</td>
</tr>
</form>
<tr>
    <td>
        
    </td>
    <td>
    </td>
    <td>
<button type="submit" form="registro" name="submit" value="submit">Registar</button>
    </td>
</tr>
</table>

</div>



</article>