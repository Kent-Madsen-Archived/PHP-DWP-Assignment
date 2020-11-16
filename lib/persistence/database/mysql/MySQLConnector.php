<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class MySQLConnector
     */
    class MySQLConnector 
        implements ConnectorTemplate, 
                   MysqlConnectorTemplate
    {
        // Constructor
        /**
         * MySQLConnector constructor.
         * @param $mysql_information
         * @throws Exception
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
         * @return mixed
         * @throws Exception
         */
        final public function connect()
        {
            $information = $this->getInformation();

            // 
            $local_connection = new mysqli( $information->retrieve_hostname(), 
                                            $information->retrieve_username(), $information->retrieve_password(), 
                                            $information->retrieve_database(),
                                            $information->retrieve_port() );
            
            // by default is true. it's set to false so it won't update the mysql state automaticly
            // consequence is that factory classes have to call commit. inorder for change to 
            // be updated.
            $local_connection->autocommit( FALSE );

            //
            if( $local_connection->connect_error )
            {
                throw new Exception( 'Error: ' . $local_connection->connect_error );
            }

            // 
            $this->setConnector( $local_connection );
            return $this->getConnector();
        }


        /**
         * @return mixed
         * @throws Exception
         */
        final public function disconnect()
        {
            $connector = $this->getConnector();
            
            $connector->close();

            // clears the connection session
            $this->setConnector(null );

            return $this->getConnector();
        }


        /**
         * @return mixed|void
         */
        final public function is_open()
        {

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


        /**
         * @param $stmt
         * @return int|mixed|null
         */
        public function finish_insert( $stmt )
        {
            $this->getConnector()->commit();

            $retVal = $stmt->insert_id;

            if( is_null( $retVal ) )
            {
                return null;
            }

            return intval( $retVal );
        }


        // Accessors
        /**
         * @return mixed
         */
        final public function getInformation()
        {
            return $this->information;
        }


        /**
         * @return mixed
         */
        final public function getConnector()
        {
            return $this->connector;
        }


        /**
         * @param $var
         * @throws Exception
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
         * @param $var
         * @return bool
         */
        final protected function validateAsMySQLInformation( $var )
        {
            $retVal = false;

            if( is_null( $var ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            if( $var instanceof MySQLInformation )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @param $var
         * @throws Exception
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
         * @param $var
         * @return bool
         */
        final protected function validateAsMysqli( $var )
        {
            $retVal = false;

            if( is_null( $var ) )
            {
                $retVal = true;
                return boolval($retVal);
            }

            if( $var instanceof mysqli )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }

    }

?>