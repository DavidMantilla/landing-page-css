<?php


session_start();
class authController{


   function sesion_create($usuario){
  
     $_SESSION['user']=$usuario;
 

   }


    function session_validate(){

        if(!isset($_SESSION['user'])){
            header('location: ../index.html');
        }
    }




    function session_validate_api(){
      
        if(!isset($_SESSION['user'])){
            echo (json_encode(["error"=>"401 Unauthorized"]));
            header('HTTP/1.1 401 Unauthorized');
            exit();
        }
    }


  
     function logout(){

        session_start();
        session_unset();
        session_destroy();
        header('location: ../index.html');
     } 



}


?>