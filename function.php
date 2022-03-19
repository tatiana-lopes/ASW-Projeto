<?php 

function changePage( $page){
    $page = strip_tags($page);
    if(!empty($page)){
        $content =$page;
        }else{
        $content = 'content' ;
        }
        return $content;
}



?>