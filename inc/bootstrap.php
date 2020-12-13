<?php
    /**
     *  Title: Bootstrap
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Page
     *  Project: DWP-Assignment
     */
    require 'inc/globals.php';
    require 'inc/functions.php';

    // Auto loader function, it loads the entirety of the lib/ directory and includes the required classes by name
    require 'inc/autoloader.php';


    // Autoloader script for loading classes automaticly.
    // So i don't have to require the files
    spl_autoload_register(
        function ( $class_name ) 
        {
            $autoloader = new Autoloader( 'lib/' );
            $autoloader->load();
            $autoloader->extract_class( $class_name );
        }
    );

    require 'vendor/autoload.php';

    // Setup Singletons
    PageTitleSingleton::getInstance();
?>