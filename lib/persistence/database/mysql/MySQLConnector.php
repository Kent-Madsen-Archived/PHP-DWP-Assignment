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
            $this->setInformation( $mysql_information );

            $this->setConnector( null );
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
            
            // by default is true. it's set to false so it won't update the mysql state automaticly
            // consequence is that factory classes have to call commit. inorder for change to 
            // be updated.
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
            if( !$this->validateAsMySQLInformation( $var ) )
            {
                throw new Exception( 'MySQLConnector - setInformation : Only class MySQLInformation or null is allowed' );
            }

            $this->information = $var;
        }

        /**
         * 
         */
        final protected function validateAsMySQLInformation( $var )
        {
            if( is_null( $var ) )
            {
                return true;
            }

            if( $var instanceof MySQLInformation )
            {
                return true;
            }

            return false;
        }

        /**
         * 
         */
        final public function setConnector( $var )
        {
            if( !$this->validateAsMysqli( $var ) ) 
            {
                throw new Exception( 'MySQLConnector - setConnector : Only class mysqli or null is allowed' );
            }

            $this->connector = $var;
        }

        /**
         * 
         */
        final protected function validateAsMysqli( $var )
        {
            if( is_null( $var ) )
            {
                return true;
            }

            if( $var instanceof mysqli )
            {
                return true;
            }

            return false;
        }

    }

?>