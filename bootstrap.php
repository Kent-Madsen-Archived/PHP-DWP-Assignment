<?php 
    //
    require 'globals.php';
    
    //
    require 'functions.php';

    // Autoloader script for loading classes automaticly.
    // So i don't have to require the files
    spl_autoload_register(
        function ( $class_name ) 
        {
            
            echo "class:" . $class_name . "</br>";
            include "lib/" . $class_name . '.php';
        }
    );
?>