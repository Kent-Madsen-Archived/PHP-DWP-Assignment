<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    require_once 'router.php';

    /**
     * Class RouterSingleton
     */
    class RouterSingleton
    {
        //
        private static $instance = null;

        /**
         * @return null
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
         * @param $var
         */
        public static function setInstance( $var )
        {
            self::$instance = $var;
        }
    }

?>