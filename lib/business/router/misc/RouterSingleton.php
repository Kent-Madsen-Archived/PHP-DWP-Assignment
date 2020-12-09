<?php
    /**
     *  Title: RouterSingleton
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class RouterSingleton
     */
    class RouterSingleton
    {
        /**
         * RouterSingleton constructor.
         * @throws Exception
         */
        function __construct()
        {
            if( is_null( self::$instance ) )
            {
                self::setInstance( new Router() );
            }
        }

        //
        private static $instance = null;


        /**
         * @return Router|null
         * @throws Exception
         */
        public static function getInstance(): ?Router
        {
            if( is_null( self::$instance ) )
            {
                return null;
            }

            return self::$instance;
        }


        /**
         * @param $var
         * @return Router|null
         * @throws Exception
         */
        public static function setInstance( $var ): ?Router
        {
            if( is_null( $var ) )
            {
                self::$instance = null;
                return self::getInstance();
            }

            if( !( $var instanceof Router ) )
            {
                RouterErrors::throwIsNotAnInstanceOfRouter();
            }

            self::$instance = $var;

            return self::getInstance();
        }
    }

?>