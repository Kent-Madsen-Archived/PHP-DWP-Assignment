<?php 
    require 'bootstrap.php'; 
    require 'router.php'; 

    $router = new Router();
    $router->execute();
?>