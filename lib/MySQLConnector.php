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
        }

        // Variables
        private $information;

        // Accessors
        /**
         * 
         */
        public function getInformation()
        {
            return $this->information;
        }

        /**
         * 
         */
        public function setInformation( $var )
        {
            $this->information = $var;
        }

        // implementations
        public function connect()
        {

        }

        public function disconnect()
        {
            
        }

        public function ping()
        {

        }
    }

?>