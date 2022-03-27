<?php 

function changePage( $page){
    $page = strip_tags($page);
    if(!empty($page)){
        $content =$page;
        }else{
        $content = 'home' ;
        }
        return $content;
}

function checkLogin(){
$tipo = NULL;    
if(isset($_SESSION['tipo']) && isset($_SESSION['tipo']) && isset($_SESSION['tipo'])){
$tipo = $_SESSION['tipo'];

}
return $tipo;

}

?>