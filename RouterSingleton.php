<?php
/**
 *  
 */ 
require_once 'router.php';

/**
 * 
 */
class RouterSingleton
{
    //
    private static $instance = null;

    /**
     * 
     */
    public static function getInstance()
    {
        if( self::$instance == null )
        {
            self::setInstance( new Router() );
        }

        return self::$instance;
    }

    /**
     * 
     */
    public static function setInstance( $var )
    {
        self::$instance = $var;
    }
}

?>