<?php 

    class NetworkAccess
    {
        /**
         * 
         */
        function __construct( $hostname, $port )
        {
            $this->setHostname( $hostname );
            $this->setPort( $port );
                
        }

        //
        private $hostname;
        private $port;

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
        final public function getPort()
        {
            return $this->port;
        }

        /**
         * 
         */
        final public function setPort( $var )
        {
            $this->port = $var;
        }

        /**
         * 
         */
        final public function setHostname( $var )
        {
            $this->hostname = $var;
        }

    }

?>