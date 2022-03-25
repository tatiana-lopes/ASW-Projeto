<?php
require_once 'functions/database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$tipo_Registro;
$erros = array();
$missing = array();

// caro queiramos usar uma pagina para todos os registros
if(isset($_GET['registar']) == "voluntario"){

} elseif ($_GET['registar'] == "instituto"){

}else{
header('location: /index.php');
exit;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['send'])){
$dadosEsperados = ['nome','email','password'];   // por todos os dados esperados;
$dadosRequeridos = ['nome','password'];   // por dados os quais sem eles não é possivel fazer registro
//fazer todas as verificações de se os dados estão corretos e tratar os mesmos

}

}

?>

<article class="form-group container">

<!--  verificar se existem erros ou dados em falta -->

<?php if ($erros || $missing): ?>
<p>Registro Invalido, por favor corrija os dados</p>
<?php endif; ?>
<div class="row">



<form action="/register.php" method="post" id="registro">


<div class="col"> 

<!--  verificar se esta em falta o nome -->


<label for="nome">Nome:
<?php if (in_array('nome', $missing)): ?>
<span>Insere o teu nome</span>   <!--  Criar uma class Style para mensagens em erro -->
<?php endif; ?>
</label>
<input type="text" class="form-control" id="nome">
<?php
// podemmos personalisar melhor cada erro , cada mensagem e cada acção
?>
<label for="email">Email:
  

<?php if (in_array('email', $erros)): ?>
<span>Erro email invalido</span>   <!--  Criar uma class Style para mensagens em erro -->
<?php endif; ?>
</label>
</label>
<input type="text"  class="form-control" id="email">
</div>
<div class="col">
  
<label for="password">Password</label>
<input type="number"  class="form-control" id="password">

<label for="cc">nº Cartão de Cidadão</label>
<input type="number"  class="form-control" id="cc">  
</div>
</div>
<div class="row">

<label for="Cconducao">nº Carta de Condução</label>
<input type="number"  class="form-control" id="Cconducao">

<label for="dob">Data de Nascimento</label>
<input type="date" class="form-control" id="dob">
</div>

<label for="gen">Género</label>
<label for="mas">Masculino</label>
<input type="radio" name="gen" class="" id="mas" value="masculino">
<label for="fem">Feminino</label>
<input type="radio" name="gen" class="" id="fem" value="feminino" >
<label for="out">Outro</label>
<input type="radio" name="gen" class="" id="out" value="outro" >


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


</form>

<button type="submit" form="registro" value="Submit">Registar</button>

</div>



</article>