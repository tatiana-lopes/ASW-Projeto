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
      // e caso a variavel email não esteja assignada
    if(empty($_POST['email'])){
        array_push($missing ,"email");
   }   
     // e caso a variavel cc não esteja assignada
    if(empty($_POST['cc'])){
       array_push($missing ,"cc");
    }
     // e caso a variavel Cconducao não esteja assignada
    if(empty($_POST['Cconducao'])){
        array_push($missing ,"Cconducao");
    } 
       // e caso a variavel gen não esteja assignada
    if(empty($_POST['gen'])){
        array_push($missing ,"gen");
    }
       // e caso a variavel gen não esteja assignada
    if(empty($_POST['gen'])){
        array_push($missing ,"gen");
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

<article class="form-group container">

<!--  verificar se existem erros ou dados em falta -->

<?php if (count($erros) >0  || count($missing) >0){ echo "
<p>Registro Invalido, por favor corrija os dados</p>";}
 ?>
<div class="row justify-content-center">


<table style="width:80%" class="">
<form action="" method="POST" id="registro" >




<!--  verificar se esta em falta o nome -->

<tr>
<td>
<label for="nome">Nome:
<?php if (in_array('name', $missing) ) 
        echo " Nome em falta";?>
</label>
<input type="text" class="form-control col-xs-4" name="nome" id="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>  " >
</td>
<td style="width:10%"></td>
<td>
<label for="email">Email:
  

</label>
<input type="text"  class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?> ">
<span class="help-block"> <?php  // texto de ajuda ou aviso)?> </span>
</td>
</tr>
<tr>

  <td>
<label for="password">Password: 
    <?php if (in_array('email', $missing)) echo "Por favor insira a sua Password;" ?>

</label>    
<input type="password"  class="form-control" name="password" id="password">
  </td>
  <td style="width:10%"></td>
  <td>
<label for="password2">Repita sua Password: 
    <?php if (in_array('email', $missing)) echo "Por favor insira a sua Password;" ?>
</label>
<input type="password"  class="form-control" name="password2" id="password2">
  </td>
</tr>
<tr>
<td>
<label for="cc">nº Cartão de Cidadão
<?php if (in_array('email', $missing)) echo "Por favor insira a sua Password;" ?>


</label>
<input type="number"  class="form-control" name="cc" id="cc">  


</td>
<td>

<label for="Cconducao">nº Carta de Condução
<?php if (in_array('email', $missing)) echo "Por favor insira a sua Password;" ?>


</label>
<input type="number"  class="form-control" name="Cconducao" id="Cconducao">
</td>
<td>
<label for="dob">Data de Nascimento
<?php if (in_array('email', $missing)) echo "Por favor insira a sua Password;" ?>

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
<?php if (in_array('email', $missing)) echo "<p>Por favor insira a sua Password;</p>" ?>
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