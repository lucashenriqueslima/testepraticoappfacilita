<?php

session_start();
require __DIR__."/vendor/autoload.php";

use Source\Router;

$router = new Router;

/**
 * App
 */
$router->get("/", "App:home");

$router->get("/exercicio1", "App:exercicio1");


$router->notFound(function(){
    echo "not found";
});


$router->run();