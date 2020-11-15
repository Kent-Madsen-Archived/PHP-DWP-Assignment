<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class SourceLoaderSingleton
     */
    class SourceLoaderSingleton
    {
        private static $instance = null;

        /**
         * @return null
         */
        public static function getInstance()
        {
            if( self::$instance == null )
            {
                self::setInstance( new SourceLoader() );
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