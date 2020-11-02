<?php 

    /**
     * 
     */
    class MySQLConnector 
        implements ConnectorTemplate
    {
        // Constructor
        /**
         * 
         */
        public function __construct( $mysql_information ) 
        {
            $this->information = $mysql_information;
            $this->connector = null;
        }

        // Variables
        private $information;
        private $connector;

        // Accessors
        /**
         * 
         */
        final public function getInformation()
        {
            return $this->information;
        }

        /**
         * 
         */
        final public function getConnector()
        {
            return $this->connector;
        }

        /**
         * 
         */
        final public function setInformation( $var )
        {
            $this->information = $var;
        }

        /**
         * 
         */
        final public function setConnector( $var )
        {
            return $this->$var;
        }


        // implementations
        final public function connect()
        {

        }

        final public function disconnect()
        {
            
        }

        final public function ping()
        {

        }
    }

?>