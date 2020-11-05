<?php 

class PageTitleSingleton
{
    private static $instance = null;

    public static function getInstance()
    {
        if( self::$instance == null )
        {
            self::setInstance( new PageTitle( null ) );
        }

        return self::$instance;
    }

    public static function setInstance( $var )
    {
        self::$instance = $var;
    }
}

?>