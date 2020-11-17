<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class SourceLoaderSingleton
     */
    class SourceLoaderSingleton
    {
        /**
         * SourceLoaderSingleton constructor.
         */
        public function __construct()
        {

        }


        // Variables
        private static $instance = null;


        /**
         * @return PageTitle|null
         */
        public static function getInstance(): ?PageTitle
        {
            self::initiate();

            return self::$instance;
        }


        /**
         * @param $var
         * @return PageTitle|null
         * @throws Exception
         */
        public static function setInstance( $var ): ?PageTitle
        {
            if( is_null( $var ) )
            {
                self::$instance = null;
            }

            if(! is_object( $var ) )
            {
                throw new Exception('Parameter variable is not a object' );
            }

            if(! ( $var instanceof PageTitle ) )
            {
                throw new Exception('Not correct class, only PageTitle is allowed' );
            }

            self::$instance = $var;
        }


        /**
         *
         */
        public static function initiate(): void
        {
            if( is_null( self::getInstance() ) )
            {
                self::setInstance( new PageTitle() );
            }
        }
    }

?>