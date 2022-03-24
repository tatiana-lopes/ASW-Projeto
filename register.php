<?php
require_once 'functions/database.php';
$username;
$password;
$errorName=false;


if($_SERVER["REQUEST_METHOD"] == "POST"){
if(!isset($_POST)){
//fazer todas as verificações de se os dados estão corretos e tratar os mesmos

}

}

?>

<article class="form-group container">
<div class="row">
<form action="" method="post">
<div class="col"> 
<label for="nome">Nome</label>
<input type="text" class="form-control" id="nome">
<?php
// podemmos personalisar melhor cada erro , cada mensagem e cada acção
if($errorName){
    echo '<label for "nome>' . "Erro no nome tal tal tal </label>";
}
?>
<label for="email">Email</label>
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
   
</select>


</form>



</div>



</article>
