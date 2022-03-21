<?php
require_once 'app/database.php';

// getFreguesia()
// getConselho()
if($_SERVER["REQUEST_METHOD"] == "POST"){

// ver se os dados são validos e depois inserir
$query = 'INSERT INTO  Voluntario(email , cc , carta_conducao , genero , dob , imgPath  ) ';
foreach($_POST as $chave => $valor){

}
}

?>

<article >
<div class="row">
<form action="" method="post">

<label for="nome">Nome</label>
<input type="text" class="" id="nome">

<label for="email">Email</label>
<input type="text"  class="" id="email">

<label for="password">Password</label>
<input type="number"  class="" id="password">

<label for="cc">nº Cartão de Cidadão</label>
<input type="number"  class="" id="cc">

<label for="Cconducao">nº Carta de Condução</label>
<input type="number"  class="" id="Cconducao">

<label for="dob">Data de Nascimento</label>
<input type="date" class="" id="dob">


<label for="gen">Género</label>
<label for="mas">Masculino</label>
<input type="radio" name="gen" class="" id="mas" value="masculino">
<label for="fem">Feminino</label>
<input type="radio" name="gen" class="" id="fem" value="feminino" >
<label for="out">Outro</label>
<input type="radio" name="gen" class="" id="out" value="outro" >


<select name="concelho">
    <?php

        //foreach()
        //echo 


    ?>
</select>

<select name="freguesia">
    <?php


       ?>
</select>


</form>



</div>






</article>