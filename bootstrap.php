<?php 
    //
    require 'globals.php';
    
    //
    require 'functions.php';

    spl_autoload_register(
        function ( $class_name ) 
        {
            include "lib/" . $class_name . '.php';
        }
    );
?>