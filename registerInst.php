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
        $checkResult = userExistsByEmail($data['email']);
             if($checkResult){
                  $erros['email']= "Utilizador com email" . $data['email'] . " já existe.";
            }
      }   
     // e caso a variavel cc não esteja assignada
     if(empty($_POST['tel'])){
        array_push($missing ,"tel");
    } else{
        $data['tel'] = htmlspecialchars($_POST['tel']);
        $data['tel'] = stripcslashes($data['tel']);  
    }
  
     // e caso a variavel Cconducao não esteja assignada
    if(empty($_POST['morada'])){
        array_push($missing ,"morada");
    } else{
        // caso contrario trata a informação e pede a função da database para ver se já existe,
        // caso existe adiciona a array erros;
        $data['morada'] = htmlspecialchars($_POST['morada']);
        $data['morada']  = stripcslashes(  $data['morada'] );
        $checkResult = userExistsByCondC($data['morada'] );
     
       // e caso a variavel gen não esteja assignada  
    }if(empty($_POST['nomeR'])){
        array_push($missing ,"nomeR");
    }else{
        $data['nomeR'] = htmlspecialchars($_POST['nomeR']);
        $data['nomeR']  = stripcslashes(  $data['nomeR'] );
       
    }
    if(empty($_POST['contatoR'])){
        array_push($missing ,"contatoR");
    }else{
        $data['contatoR'] = htmlspecialchars($_POST['contatoR']);
        $data['contatoR']  = stripcslashes(  $data['contatoR'] );
    
    }
    if(empty($_POST['description'])){
        array_push($missing ,"description");

    }else{
        $data['description'] = htmlspecialchars($_POST['description']);
        $data['description']  = stripcslashes(  $data['description'] );
        
    }

    if(empty($_POST['tipo'])){
        array_push($missing ,"description");

    }else{
        $data['tipo'] = htmlspecialchars($_POST['tipo']);
        $data['tipo']  = stripcslashes(  $data['tipo'] );
        
    }

    if(isset($pass)&& isset($passRepetition)){
    if($pass !== $passRepetition){
        $erros['pass'] = "Passwords não são identicas";
    }
    
    }
    // se não houve[r erros ou valores vazios
    if(empty($missing) && empty($erros)){
        $data['cod_distrito'] = htmlspecialchars($_POST['cod_distrito']);
        $data['cod_concelho'] = htmlspecialchars($_POST['cod_concelho']);
        $data['cod_freguesia'] = htmlspecialchars($_POST['cod_freguesia']);
        $data['cod_distrito'] = strip_tags($data['cod_distrito']);
        $data['cod_concelho'] = strip_tags($data['cod_concelho']);
        $data['cod_freguesia'] = strip_tags($data['cod_freguesia']);
    //para cada valor do pos tratar e adicionar a uma array associativa
   $result = RegisterInstitution($data);
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

<article  class="form-group  justify-content-center">
    <br>
<!--  verificar se existem erros ou dados em falta -->
<?php if (count($erros) >0  || count($missing) >0){ echo "
<p class=\"alerta\">Registro Invalido, por favor corrija os dados</p>";}
if(isset($erros['pass'])) echo "<p class=\"alerta\">". $erros['pass'] ."</p>";  // secalhar no futuro metemos um foreach dos erros
?>
    <div class="justify-content-center">


        <form action="" method="POST" id="registro">




            <!--  verificar se esta em falta o nome -->
            <div class=" row">
                <div class="col">
                    <label for="nome">Nome:
                        <?php if (in_array('nome', $missing) ) 
echo "<span class=\"alerta\" > Introduza Nome*</span>";?>
                    </label>
                    <input type="text" class="form-control <?php if (in_array('nome', $missing)) 
echo " is-invalid";?> " name="nome" id="nome" value="">

                </div>
                <div class="col">
                    <label for="email">Email:
                        <?php if (in_array('email', $missing) ) 
echo "<span class=\"alerta\" > Introduza Email*</span>";?>

                    </label>
                    <input type="text" class="form-control" id="email" name="email" value="">
                    <span class="help-block"> <?php  // texto de ajuda ou aviso)?> </span>

                </div>
            </div>
            <div class="row">

                <div class="col">

                    <label for="password">Password:
                        <?php if (in_array('password', $missing) ) 
echo "<span class=\"alerta\" > Password em falta*</span>";?>
                    </label>
                    <input type="password" class="form-control" name="password" id="password">

                </div>

                <div class="col">
                    <label for="tel">Telefone:
                        <?php if (in_array('tel', $missing)) 
echo " Telefone em falta";?>
                    </label>
                    <input type="number" class="form-control  <?php if (in_array('tel', $missing)) 
echo " isIis-invalid";?>" id="tel" name="tel" value="<?php 
if(isset($_POST['tel'])) echo $_POST['tel'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <label for="password2">Repita sua Password:
                        <?php if (in_array('password2', $missing) ) 
echo "<span class=\"alerta\" > Password em falta *</span>";?>
                    </label>
                    <input type="password" class="form-control" name="password2" id="password2">
                </div>

                <div class="col">

                    <label for="morada">Morada
                        <?php if (in_array('morada', $missing)) 
echo " Nome em falta";?>

                    </label>

                    <input type="text" class="form-control" id="morada" name="morada"
                        value="<?php if(isset($_POST['morada'])) echo $_POST['morada'] ?>">
                </div>


            </div>



            <div class="row">
                <div class="col">
                    <label for="dist" class="">
                        Distrito
                    </label>
                    <select name="cod_distrito" class="form-control" id="dist">
                        <?php

$distritos = getDistritos();
if($distritos > 0 ){
foreach($distritos as $key => $valor ){
echo "<option value=" . $valor['cod_distrito'] . ">". $valor['nome']   . "</option>" ; 
}



}


?>
                    </select>

                </div>
                <div class="col">
                    <label for="conc" class="">
                        Concelho
                    </label>
                    <select name="cod_concelho" class="form-control" id="conc">
                        <?php

$concelho = getConcelhos();
if($concelho > 0 ){
foreach($concelho as $valor ){
echo "<option value=" . $valor['cod_concelho'] . ">". $valor['nome'] . "</option>" ; 
}



}


?>
                    </select>

                </div>
                <div class="col">
                    <label for="freg" class="">
                        Freguesia
                    </label>
                    <select name="cod_freguesia" class="form-control" id="freg">
                        <?php

$freguesias = getFreguesias();
if($freguesias > 0 ){
    foreach($freguesias as $freg ){
        echo "<option value=" . $freg['cod_freguesia'] . ">". $freg['nome'] . "</option>" ; 
    }



}


?>
                    </select>

                </div>

            </div>

            <div class="row">
                <div class="col">

                    <label for="nomeR">Nome Responsavel:
                        <?php if (in_array('name', $missing)) 
                echo " Nome em falta";?>
                    </label>
                    <input type="text" class="form-control" id="nomeR" name="nomeR"
                        value="<?php if(isset($_POST['nomeR'])) echo $_POST['nomeR'] ?>">
                </div>
                <div class="col">
                    <label for="contatoR">Contacto Responsavel:
                        <?php if (in_array('name', $missing)) echo " Contacto em falta";?>
                    </label>
                    <input type="number" class="form-control" id="contatoR" name="contatoR"
                        value="<?php if(isset($_POST['contatoR'])) echo $_POST['contatoR'] ?>">
                </div>

            </div>


    </div>


    <div class="row">
        <div class="col">

            <label for="tipo">Tipo de Instituição:
                <?php if (in_array('name', $missing)) 
                echo " Nome em falta";?>
            </label>
            <input type="text" class="form-control" id="tipo" name="tipo"
                value="<?php if(isset($_POST['tipo'])) echo $_POST['tipo'] ?>">
        </div>

    </div>


    <div class="row">

        <div class="col">

            <label for="description"></label>
            <textarea class="form-control" name="description" cols="10" rows="4"
                value="<?php if(isset($_POST['description'])) echo $_POST['description'] ?>"> Breve descrição sobre a sua Instituição
</textarea>





        </div>
    </div>
    <div class="row">
        <div class="col-auto">
            <br>
            <label for="inputFile" class="col-form-label">Foto de perfil</label>
        </div>

        <div class="col">
            <div class="custom-file">
                <br>

                <input type="file" class="form-control-file" id="inputFile" lang="pt">
                <span id="passwordHelpInline" class="form-text">
                    Ficheiro max 2mb

            </div>


        </div>
    </div>
    </div>

    <div class="row justify-content-center">


        <button type="submit" class="btn btn-primary btn-lg" form="registro" name="submit"
            value="submit">Registar</button>


    </div>
    </div>
    </form>



    </div>

</article>