<?php
require './vendor/autoload.php';
use Routers\Router;
$newRout=new Router();
$newRout->add('GET', '/', [controller::class, 'home']);
$newRout->add('GET', '/about', [controller::class, 'about']);
?>