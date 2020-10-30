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
        final public function getInformation()
        {
            return $this->information;
        }

        /**
         * 
         */
        final public function setInformation( $var )
        {
            $this->information = $var;
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