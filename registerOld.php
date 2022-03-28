<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$erros = array();
$missing = array();
$data = array();


//Caso tenha sido feito um pedido Post
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // e caso a variavel submit esteja assignada
    if(array_key_exists('submit',$_POST)){

   // e caso a variavel name não esteja assignada
    if(empty($_POST['nome'])){
    array_push($missing, 'nome');    
    
    }else{
        $data['nome'] = htmlspecialchars($_POST['nome']);
        $data['nome'] = stripcslashes($data['nome']);
    }   
      // e caso a variavel passwor não  esteja assignada
    if(empty($_POST['password'])){
    array_push($missing ,"password");
    }else{
        $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

    }
    if(empty($_POST['password2'])){
        array_push($missing ,"password2");
        }else{
            $passRepetition= password_hash($_POST['password2'], PASSWORD_BCRYPT);
    
        }
      // e caso a variavel email não esteja assignada
    if(empty($_POST['email'])){
        array_push($missing ,"email");
   }else{
       $data['email'] = htmlspecialchars($_POST['email']);
       $data['email'] = stripcslashes( $data['email']);
      // $checkResult = userExistsByEmail($data['email']);
        //     if($checkResult){
                //   $erros['email']= "Utilizador com email" . $data['email'] . " já existe.";
          //    }
      }   
     // e caso a variavel cc não esteja assignada
    if(empty($_POST['cc'])){
       array_push($missing ,"cc");
    }else{
        $data['cc'] = htmlspecialchars($_POST['cc']);
        $data['cc'] = stripcslashes($data['cc']);
    }
     // e caso a variavel Cconducao não esteja assignada
    if(empty($_POST['Cconducao'])){
        array_push($missing ,"Cconducao");
    } else{
        // caso contrario trata a informação e pede a função da database para ver se já existe,
        // caso existe adiciona a array erros;
        $data['Cconducao'] = htmlspecialchars($_POST['Cconducao']);
        $data['Cconducao']  = stripcslashes(  $data['Cconducao'] );
        $checkResult = userExistsByCondC($data['Cconducao'] );
        if($checkResult){
         $erros['Cconducao']= "Utilizador com email" . $email . " já existe.";
        }
       // e caso a variavel gen não esteja assignada  
    }if(empty($_POST['dob'])){
        array_push($missing ,"dob");
    }else{
        $data['dob'] = htmlspecialchars($_POST['dob']);
        $data['dob']  = stripcslashes(  $data['dob'] );
       
    }
    if(isset($pass)&& isset($passRepetition)){
    if($pass !== $passRepetition){
        $erros['pass'] = "Passwords não são identicas";
    }
}
    // se não houve[r erros ou valores vazios
    if(empty($missing) && empty($erros)){
        $data['codC'] = htmlspecialchars($_POST['codC']);
        $data['freg'] = htmlspecialchars($_POST['freg']);
        $data['codC'] = strip_tags($data['codC']);
        $data['freg'] = strip_tags($data['freg']);
    //para cada valor do pos tratar e adicionar a uma array associativa
   $result = RegisterVoluntario($data);
        if($result){
            //caso o resultado seja positivo ir para o index
            session_start();
             header('Location: index.php');
                 die();

          }else{
              //caso contrario adicionar a array erros
        $erros['submit'] = TRUE;

        }
    }
    // fazer chamada a função para registar
    
    

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
<select name="concelho" name="codC" id="codC">
 
    <?php
    
 $concelhos = getConcelhos();
 if($freguesia > 0 ){
     foreach($freguesia as $valor ){
         echo "<option value" . $valor['codigo'] . ">". $valor['nome'] . "</option>" ; 
     }
  
    

 }


?>



</select>
</td>
<td>
<select name="freguesia"  name="freg" id="freg">
<?php
// desativado momentaneamente , mais tarde estará ligado a json e obtera os dados da api geoapi

//    $freguesia = getFreguesias();
//    if($freguesia > 0 ){
//        foreach($freguesia as $valor ){
//            echo "<option value" . $valor['codigo'] . ">". $valor['nome'] . "</option>" ; 
//        }
     
       
   
//    }
   
   
   ?> 
</select>
</td>
</tr>
<tr>
    <td>  <div class="custom-file">

    <input type="file" class="custom-file-input" id="customFileLang"  lang="pt">
    <label class="custom-file-label" for="inputGroupFile03">Foto de perfil</label>
  </div>
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