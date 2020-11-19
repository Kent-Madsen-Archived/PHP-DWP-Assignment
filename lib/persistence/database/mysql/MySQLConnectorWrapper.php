<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class MySQLConnectorWrapper
     */
    class MySQLConnectorWrapper
        implements ConnectorTemplate, 
                   MysqlConnectorTemplate
    {
        // Constructor
        /**
         * MySQLConnectorWrapper constructor.
         * @param $mysql_information
         * @throws Exception
         */
        public function __construct( $mysql_information ) 
        {
            $this->setInformation( $mysql_information );

            $this->setConnector( null );
        }


        // Variables
        private $information    = null;
        private $connector      = null;


        // implementations
        /**
         * @return mysqli|null
         * @throws Exception
         */
        final public function connect() : ?mysqli
        {
            $information = $this->getInformation();

            // 
            $local_connection = new mysqli( $information->retrieveHostname(),
                                            $information->retrieveUsername(), $information->retrievePassword(),
                                            $information->retrieveDatabase(),
                                            $information->retrievePort() );
            
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
         * @return mysqli|null
         * @throws Exception
         */
        final public function disconnect() : ?mysqli
        {
            $connector = $this->getConnector();
            
            $connector->close();

            // clears the connection session
            $this->setConnector(null );

            return $this->getConnector();
        }


        /**
         * @return bool
         */
        final public function is_open() : bool
        {
            $retVal = false;

            if( is_null( $this->getConnector() ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         *
         */
        final public function undoState()
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
         * @return int|null
         */
        public function finishCommitAndRetrieveInsertId($stmt ) : ?int
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
        final public function getInformation() : ?MySQLInformation
        {
            return $this->information;
        }


        /**
         * @return mixed
         */
        final public function getConnector() : ?mysqli
        {
            return $this->connector;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setInformation( $var ) : ?MySQLInformation
        {
            if( !$this->validateAsMySQLInformation( $var ) )
            {
                throw new Exception( 'MySQLConnectorWrapper - setInformation : Only class MySQLInformation or null is allowed' );
            }

            $this->information = $var;

            return $this->getInformation();
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
                throw new Exception( 'MySQLConnectorWrapper - setConnector : Only class mysqli or null is allowed' );
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