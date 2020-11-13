<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class MySQLConnector 
        implements ConnectorTemplate, 
                   MysqlConnectorTemplate
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

        // implementations
        /**
         * 
         */
        final public function connect()
        {
            $information = $this->getInformation();


            // 
            $local_connection = new mysqli( $information->retrieve_hostname(), 
                                            $information->retrieve_username(), $information->retrieve_password(), 
                                            $information->retrieve_database(), $information->retrieve_port() );
            
            $local_connection->autocommit( FALSE );

            // 
            $this->setConnector( $local_connection );
        }

        /**
         * 
         */
        final public function disconnect()
        {
            $connector = $this->getConnector();
            
            $connector->close();   
        }

        /**
         *
         */
        final public function undo_state()
        {
            $this->getConnector()->rollback();
        }

        /**
         * 
         */
        final public function finish()
        {
            $this->getConnector()->commit();
        }

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
            $this->connector = $var;
        }

    }

?>