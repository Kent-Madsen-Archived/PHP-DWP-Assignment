<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


/**
 * Class PersonAddressFactory
 */
    class PersonAddressFactory 
        extends FactoryTemplate
    {
        /**
         * @return string
         */
        final public static function getTableName()
        {
            return 'person_address';
        }


        /**
         * @return string
         */
        final public function getFactoryTableName()
        {
            return self::getTableName();
        }


        /**
         * @return string
         */
        final public static function getViewName()
        {
            return 'PersonAddressView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'PersonAddressController';
        }


        /**
         * PersonAddressFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {   
            $this->setConnector( $mysql_connector );
        }


        /**
         * TODO: This
         */
        final public function setup()
        {
            
        }
        

        /**
         * TODO: This
         */
        final public function setupSecondaries()
        {
            
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function exist_database()
        {
            $status_factory = new StatusFactory( $this->getConnector() );
            
            $database = $this->getConnector()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return boolval( $value );
        }


        /**
         * @return PersonAddressModel
         */
        final public function createModel()
        {
            $model = new PersonAddressModel( $this );

            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var )
        {
            $retVal = false;

            if( $var instanceof PersonAddressModel )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array
         * @throws Exception
         */
        final public function read()
        {
            $retVal = array();

            $connection = $this->getConnector()->connect();

            $sql = "SELECT * FROM person_address LIMIT ? OFFSET ?;";

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii", 
                                   $stmt_limit, 
                                   $stmt_offset );

                $stmt_limit = $this->getLimit();
                $stmt_offset = $this->calculateOffset();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $personAddressModel = $this->createModel();

                        $personAddressModel->setIdentity( $row[ 'identity' ] );
    
                        $personAddressModel->setStreetName( $row[ 'street_name' ] );
                        $personAddressModel->setStreetAddressNumber( $row[ 'street_address_number' ] );
                        $personAddressModel->setZipCode( $row[ 'zip_code' ] );
                        $personAddressModel->setCountry( $row[ 'country' ] );

                        array_push( $retVal, $personAddressModel );
                    }
                }   
                
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }
            
            return $retVal;
        }


        /**
         * @param $model
         * @return null
         * @throws Exception
         */
        final public function read_model( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = null;

            return $retVal;
        }


        /**
         * @param $model
         * @return mixed
         * @throws Exception
         */
        final public function create( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = array();

            $connection = $this->getConnector()->connect();

            $sql = "INSERT INTO person_address( street_name, street_address_number, zip_code, country ) VALUES( ?, ?, ?, ? );";

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "siss", 
                                    $stmt_name, 
                                    $stmt_street_address_number, 
                                    $stmt_zip_code, 
                                    $stmt_country );

                //
                $stmt_name                  =  $model->getStreetName();
                $stmt_street_address_number =  $model->getStreetAddressNumber();
                $stmt_zip_code              =  $model->getZipCode();
                $stmt_country               =  $model->getCountry();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();

                $model->setIdentity( $stmt->insert_id );

                $retVal = $model;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }
            
            return $retVal;
        }


        /**
         * @param $model
         * @return mixed
         * @throws Exception
         */
        final public function update( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = array();

            $connection = $this->getConnector()->connect();

            $sql = "UPDATE person_address SET street_name = ?, street_address_number = ?, zip_code = ?, country = ? WHERE identity = ?;";

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "sissi", 
                                    $stmt_name, 
                                    $stmt_street_address_number, 
                                    $stmt_zip_code, 
                                    $stmt_country, 
                                    $stmt_identity );

                //
                $stmt_name                  = $model->getStreetName();
                $stmt_street_address_number = $model->getStreetAddressNumber();
                $stmt_zip_code              = $model->getZipCode();
                $stmt_country               = $model->getCountry();

                $stmt_identity              = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();

                $retVal = $model;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        final public function delete( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = null;

            $connection = $this->getConnector()->connect();

            $sql = "DELETE FROM person_address WHERE identity = ?;";

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "i",  
                                    $stmt_identity );

                //
                $stmt_identity = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();

                $retVal = TRUE;
            }
            catch( Exception $ex )
            {
                $retVal = FALSE;

                // Rolls back, the changes
                $this->getConnector()->undo_state();

                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }


        /**
         * @return int|mixed
         * @throws Exception
         */
        final public function length()
        {
            $retVal = ZERO;

            $connection = $this->getConnector()->connect();

            $sql = "SELECT count( * ) AS number_of_rows FROM " . self::getTableName() . ";";

            try 
            {
                $stmt = $connection->prepare( $sql );
                
                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $retVal = $row[ 'number_of_rows' ];
                    }
                }  
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                //
                $this->getConnector()->disconnect();
            }

            return intval( $retVal );
        }


        /**
         * @param $classObject
         * @return bool
         * @throws Exception
         */
        final public function classHasImplementedController( $classObject )
        {
            $retVal = false;

            if( is_null( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedController, classObject is null, function only accepts classes');
            }

            if( !is_object( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedController, classObject is not a object. function only accepts classes.');
            }

            if( Factory::modelImplements( $classObject, self::getControllerName() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
        }


        /**
         * @param $classObject
         * @return bool
         * @throws Exception
         */
        final public function classHasImplementedView( $classObject )
        {
            $retVal = false;

            if( is_null( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedView, classObject is null, function only accepts classes');
            }

            if( !is_object( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedView, classObject is not a object., function only accepts classes');
            }

            if( Factory::modelImplements( $classObject, self::getViewName() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
        }

    }
?>