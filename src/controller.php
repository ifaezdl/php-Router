<?php
namespace Router;
use Router\JsonHandler;
class controller { 

    public function __construct(){

        
    }
    public function home() {
         echo "Home page!"; 
        }
    public function about() {
         echo "About page!"; 
        }

    public function staticUser(){
        
        $newUser=new JsonHandler();
        $newUser->ShowData();
    }

    public function userWithId($id){
        $newUser=new JsonHandler();
        $newUser->specifiedUser($id);
        
    }
    }
?>