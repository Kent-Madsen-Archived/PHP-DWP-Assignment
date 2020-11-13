<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class NetworkAccess
    {
        // Constructors
        /**
         * 
         */
        public function __construct( $hostname, $port )
        {
            if( is_null( $hostname ) )
            {
                $this->setHostname( self::getDefaultServer() );
            }
            else 
            {
                $this->setHostname( $hostname );
            }
            
            if( is_null( $port ) )
            {
                $this->setPort( self::getDefaultPort() );
            }
            else 
            {
                $this->setPort( $port );
            }
        }

        // Internal Variables
        private $hostname;
        private $port;

        // Accessors
        /**
         * 
         */
        final public function getHostname()
        {
            return $this->hostname;
        }

        /**
         * 
         */
        final public function setHostname( $var )
        {
            if( !is_string( $var ) )
            {
                throw new Exception( 'Network Access - setHostname: Only string are allowed' );
            }

            $this->hostname = $var;
        }


        /**
         * 
         */
        final public function getPort()
        {
            return $this->port;
        }

        /**
         * 
         */
        final public function setPort( $var )
        {
            if( !is_numeric( $var ) )
            {
                throw new Exception( 'Network Access - setPort: Only numeric character are allowed' );
            }

            $this->port = $var;
        }

        /**
         * 
         */
        final static public function getDefaultPort()
        {
            return 3600;
        }

        /**
         * 
         */
        final static public function getDefaultServer()
        {
            return "localhost";
        }

    }

?>