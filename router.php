<?php

/**
 * 
 */
class Router
{
    /**
     * 
     */
    function __constructor()
    {

    }
    
    /**
     * 
     */
    public function execute()
    {
        $request_uri = $this->current_request();

        // Default to
        if( $request_uri == '/' )
        {
            require 'views/index.php';
            return;
        }


        $split_uri = explode( '/', $request_uri );
        
        $domain = $split_uri[1];
        
        // If domain exist
        switch( $domain )
        {
            case 'index.php':
                require 'views/index.php';
            break;
            
            case 'homepage':
                require 'views/index.php';
            break;

            case 'checkout':
                require 'views/checkout.php';
            break;

            case 'shop':
                require 'views/shop.php';
            break;

            case 'contact':
                require 'views/contact.php';
            break;

            case 'about':
                require 'views/about.php';
            break;

            case 'setup':
                require 'views/setup.php';
            break;

            case 'profile':
                require 'views/profile.php';
            break;
            
            default:
                require 'views/404.php';
            break;
        }
    }

    /**
     * 
     */
    private function current_request()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * 
     */
    private function current_hostname()
    {
        return $_SERVER['HTTP_HOST'];
    }

    /**
     * 
     */
    public function print_request()
    {
        echo "current host: " . $this->current_hostname();
        echo "</br>";
        echo "current request: " . $this->current_request();
    }
}

?>