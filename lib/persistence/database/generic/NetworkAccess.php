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
        private $hostname   = null;
        private $port       = null;


        // Accessors
        /**
         * @return string|null
         */
        final public function getHostname()
        {
            if( is_null( $this->hostname ) )
            {
                return null;
            }

            return strval( $this->hostname );
        }


        /**
         * @return int|null
         */
        final public function getPort()
        {
            if( is_null( $this->port ) )
            {
                return null;
            }

            return intval( $this->port );
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setHostname( $var )
        {
            if( is_null( $var ) )
            {
                $this->hostname = $var;
                return $this->hostname;
            }

            if( !is_string( $var ) )
            {
                throw new Exception( 'Network Access - setHostname: Only string are allowed' );
            }

            $this->hostname = strval( $var );

            return strval( $this->hostname );
        }


        /**
         * @param $var
         * @return int|null
         * @throws Exception
         */
        final public function setPort( $var )
        {
            if( is_null( $var ) )
            {
                $this->port = $var;
                return $this->port;
            }

            if( !is_numeric( $var ) )
            {
                throw new Exception( 'Network Access - setPort: Only numeric character are allowed' );
            }

            $this->port = intval( $var, BASE_10 );

            return intval( $this->port );
        }


        /**
         * @return NetworkAccess
         * @throws Exception
         */
        final static public function generateNetworkAccess()
        {
            return new NetworkAccess( self::getDefaultServer(), self::getDefaultPort() );
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