<?php
require './vendor/autoload.php';
use Router\Router;
use Router\controller;
$newRout=new Router();
$newRout->add('GET', '/', [controller::class, 'home']);
$newRout->add('GET', '/about', [controller::class, 'about']);
$newRout->add('GET','/api/v1/user',[controller::class,'staticUser']);
$newRout->add('GET','/api/v1/user/{id}',[controller::class,'userWithId']);
$newRout->dispatch($_SERVER['REQUEST_URI']);
?>