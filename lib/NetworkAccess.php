<?php 

    /**
     * 
     */
    class NetworkAccess
    {
        // Constructors
        /**
         * 
         */
        function __construct( $hostname, $port )
        {
            $this->setHostname( $hostname );
            $this->setPort( $port );     
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