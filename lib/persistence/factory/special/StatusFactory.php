<?php

    /**
     * Class StatusFactory
     */
    class StatusFactory
    {
        /**
         * StatusFactory constructor.
         * @param $mysql_connector
         */
        public function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }


        // Variables
        private $connector = null;


        /**
         * @param $name
         * @return bool
         * @throws Exception
         */
        final public function getDatabaseStatus( $name )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            $retVal = false;

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "SELECT SCHEMA_NAME = ? AS validation FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = ?;";

            $stmt_compare_name          = null;
            $stmt_where_schema_name_is  = null;

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ss",
                                    $stmt_compare_name,
                                    $stmt_where_schema_name_is );

                //
                $stmt_compare_name         = $name;
                $stmt_where_schema_name_is = $name;

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > Factory::Zero() )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        if( $row[ 'validation' ] == 1 )
                        {
                            $retVal = true;
                        }
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $schema
         * @param $table
         * @return bool
         * @throws Exception
         */
        final public function getStatusOnTable( $schema, $table )
        {
            $retVal = false;

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "SELECT TABLE_NAME = ? AS validation FROM information_schema.tables WHERE TABLE_SCHEMA = ? AND TABLE_TYPE = ? AND TABLE_NAME = ?;";

            $stmt_compare_name = null;
            $stmt_table_schema = null;
            $stmt_table_type   = null;
            $stmt_table_name   = null;

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssss",
                                    $stmt_compare_name,
                                    $stmt_table_schema,
                                    $stmt_table_type, 
                                    $stmt_table_name );

                $stmt_table_schema  = $schema;
                $stmt_table_type    = 'BASE TABLE';

                $stmt_table_name    = $table;
                $stmt_compare_name  = $table;

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > Factory::Zero() )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        if( $row[ 'validation' ] == 1 )
                        {
                            $retVal = true;
                        }
                    }
                }

            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $schema
         * @param $view
         * @return bool
         * @throws Exception
         */
        final public function getStatusOnView( $schema, $view )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            $retVal = false;

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "SELECT TABLE_NAME = ? AS validation FROM information_schema.tables WHERE TABLE_SCHEMA = ? AND TABLE_TYPE = ? AND TABLE_NAME = ?;";

            $stmt_compare_name = null;
            $stmt_table_schema = null;
            $stmt_table_type   = null;
            $stmt_table_name   = null;

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssss",
                                    $stmt_compare_name,
                                    $stmt_table_schema,
                                    $stmt_table_type, 
                                    $stmt_table_name );

                $stmt_table_schema = $schema;
                $stmt_table_type = 'VIEW';

                $stmt_table_name = $view;
                $stmt_compare_name = $view;


                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        if( $row[ 'validation' ] == 1 )
                        {
                            $retVal = true;
                        }
                    }
                }

            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return boolval( $retVal );
        }


        // Accessors
        /**
         * @return null
         */
        final public function getConnector()
        {
            return $this->connector;
        }


        /**
         * @param $connector
         */
        final public function setConnector( $connector )
        {
            $this->connector = $connector;
        }

    }

?>