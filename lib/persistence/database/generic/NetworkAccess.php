<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class NetworkAccess
     */
    class NetworkAccess
    {
        /**
         * NetworkAccess constructor.
         * @param $hostname
         * @param $port
         * @throws Exception
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
         * @return mixed
         */
        final public function getHostname()
        {
            return $this->hostname;
        }

        /**
         * @param $var
         * @throws Exception
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
         * @return mixed
         */
        final public function getPort()
        {
            return $this->port;
        }

        /**
         * @param $var
         * @throws Exception
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
         * @return int
         */
        final static public function getDefaultPort()
        {
            return 3600;
        }

        /**
         * @return string
         */
        final static public function getDefaultServer()
        {
            return "localhost";
        }

    }

?>