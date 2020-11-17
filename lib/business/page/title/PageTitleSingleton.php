<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PageTitleSingleton
     */
    class PageTitleSingleton
    {
        private static $instance = null;

        /**
         * @return null
         */
        public static function getInstance()
        {
            if( self::$instance == null )
            {
                self::setInstance( new PageTitle( null ) );
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