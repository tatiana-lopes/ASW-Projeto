<?php
include "database.php";

function isAdmin(){

}

function loginAdmin($user,$pass){
        $conn = getConnection();
        $query = "SELECT * FROM Admin WHERE username =  \"{$user}\" AND password = \"{$pass}\" ";
        $result = mysqli_query($conn,$query);
        $login=false;
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }  
           // caso as passwords sejam iguais , criar uma sessão em que
              $_SESSION['tipo'] = 'Admin';          // é declarado um voluntário e é dado o seu nome e id encriptado
              $_SESSION['user'] = $user['username'];      // o id encriptado sera usado para ir a sua pagina de preferencias 
              $_SESSION['id'] = $user['admin_id'];
              $login = true;
            }else{
                return false;
            }
        
        mysqli_close($conn);
        return $login;
    }

    function checkIfAdminExists($id){
        $conn = getConnection();
        $query = "SELECT * FROM Admin WHERE admin_id =  \"{$id}\" ";
        $result = mysqli_query($conn,$query);
        $login=false;
        if (mysqli_num_rows($result) > 0) {
            $login= true;
            }else{
                $login= false;
            }
        
        mysqli_close($conn);
       return $login;
    }


function isLoggedIn(){
$result =false;
if(isset($_SESSION)){
    if(strcmp($_SESSION['tipo'],'Admin')==0){
     $result = true;
    }
}
  // $result = checkIfAdminExists($_SESSION['id']);
    
return $result;
}



function changePage( $page){
    $page = strip_tags($page);
    if(!empty($page)){
        $content =$page;
        }else{
        $content = 'home' ;
        }
        return $content;
}


function getUserById(){



}

function getUserbyType(){




}

function deleteUsert($id){

}

function editUser($id){


}

function getCountUsers(){

}

function getCountVoluntarios(){


}

function getCountInstitutos(){


}





?>