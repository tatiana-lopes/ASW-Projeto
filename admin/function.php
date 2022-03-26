<?php
include "database.php";

function isAdmin(){

}

function loginAdmin($user,$pass){
        $conn = getConnection();
        $query = "SELECT * FROM Admin WHERE username =  \" . $user . \" ";
        $result = mysqli_query($conn,$query);
        $login=false;
        if (mysqli_num_rows($result) > 0) {
                session_start();// caso as passwords sejam iguais , criar uma sessão em que
              $_SESSION['tipo'] = "Admin";          // é declarado um voluntário e é dado o seu nome e id encriptado
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
        $query = "SELECT * FROM Admin WHERE admin_id =  \" . $id . \" ";
        $result = mysqli_query($conn,$query);
        $login=false;
        if (mysqli_num_rows($result) > 0) {
             return true;
            }else{
                return false;
            }
        
        mysqli_close($conn);
       
    }


function isLoggedIn(){
$result =false;
if(isset($_SESSION['id'])){
   $result = checkIfAdminExists($_SESSION['id']);
    

}
return $result;

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