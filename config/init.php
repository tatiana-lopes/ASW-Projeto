<!-- funções iniciais -->
<?php 

//Encontra dinamicamente o local do site no servidor
$end_html =strpos($_SERVER['SCRIPT_NAME'], '/public') +7;  // ATENÇÃO QUANDO MUDARMOS PARA O SERVIDOR DA ESCOLA TEMOS QUE MUDAR PARA /public
$root_servidor = substr($_SERVER['SCRIPT_NAME'],0, $end_html);
define("WWW_ROOT". "/html/asw/", $root_servidor)



?>