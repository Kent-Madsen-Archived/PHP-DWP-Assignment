<?php 
    /**
     *  title:
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
         * PersonAddressFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {   
            $this->setWrapper( $mysql_connector );
            $this->setPaginationIndex(CONSTANT_ZERO);
            $this->setLimit(CONSTANT_ZERO);
        }


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
        final public function getFactoryTableName():string
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
         * @return bool
         * @throws Exception
         */
        final public function exist(): bool
        {
            $status_factory = new StatusFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
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
         * @return array|mixed|null
         * @throws Exception
         */
        final public function read()
        {
            //
            $retVal = null;

            // SQL Query
            $sql = "SELECT * FROM person_address LIMIT ? OFFSET ?;";

            //
            $stmt_limit  = null;
            $stmt_offset = null;

            //
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "ii", 
                                   $stmt_limit, 
                                   $stmt_offset );

                $stmt_limit = $this->getLimit();
                $stmt_offset = $this->CalculateOffset();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $personAddressModel = $this->createModel();

                        $personAddressModel->setIdentity( $row[ 'identity' ] );
    
                        $personAddressModel->setStreetName(  $row[ 'street_name' ]  );
                        $personAddressModel->setStreetAddressNumber( $row[ 'street_address_number' ] );

                        $personAddressModel->setZipCode(  $row[ 'zip_code' ]  );
                        $personAddressModel->setCountry(  $row[ 'country' ]  );

                        $personAddressModel->setStreetFloor( $row['street_address_floor']  );

                        array_push( $retVal, $personAddressModel );
                    }
                }   
                
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }
            
            return $retVal;
        }


        /**
         * @param $model
         * @return null
         * @throws Exception
         */
        final public function read_model( &$model )
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
        final public function create( &$model ):bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return value
            $retVal = false;

            // SQL Query
            $sql = "INSERT INTO person_address( street_name, street_address_number, zip_code, country, street_address_floor ) VALUES( ?, ?, ?, ?, ? );";

            // Prepared Statement Variables
            $stmt_name = null;
            $stmt_street_address_number = null;
            $stmt_zip_code = null;
            $stmt_country = null;
            $stmt_street_floor = null;

            // Opens a connection to a MySQL database
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );
                
                //
                $stmt->bind_param( "sisss",
                                    $stmt_name, 
                                    $stmt_street_address_number, 
                                    $stmt_zip_code, 
                                    $stmt_country,
                                    $stmt_street_floor );

                //
                $stmt_name                  =  $model->getStreetName();
                $stmt_street_address_number =  $model->getStreetAddressNumber();
                $stmt_zip_code              =  $model->getZipCode();
                $stmt_country               =  $model->getCountry();
                $stmt_street_floor          =  $model->getStreetFloor();

                // Executes the query
                $stmt->execute();

                $model->setIdentity( $this->getWrapper()->finish_insert( $stmt ) );
                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undo_state();
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }
            
            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return mixed
         * @throws Exception
         */
        final public function update( &$model ):bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return value
            $retVal = false;

            // SQL Query
            $sql = "UPDATE person_address SET street_name = ?, street_address_number = ?, zip_code = ?, country = ?, street_address_floor=? WHERE identity = ?;";

            // prepared statement variables
            $stmt_name                  = null;
            $stmt_street_address_number = null;
            $stmt_zip_code              = null;
            $stmt_country               = null;
            $stmt_address_floor         = null;

            $stmt_identity              = null;

            // opens a connection to the mysql server
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );
                
                //
                $stmt->bind_param( "sisssi",
                                    $stmt_name, 
                                    $stmt_street_address_number, 
                                    $stmt_zip_code, 
                                    $stmt_country,
                                    $stmt_address_floor,
                                    $stmt_identity );

                //
                $stmt_name                  = $model->getStreetName();
                $stmt_street_address_number = $model->getStreetAddressNumber();
                $stmt_zip_code              = $model->getZipCode();
                $stmt_country               = $model->getCountry();
                $stmt_address_floor         = $model->getStreetFloor();

                $stmt_identity              = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getWrapper()->finish();

                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undo_state();
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        final public function delete( &$model ):bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return value
            $retVal = false;

            // SQL Query
            $sql = "DELETE FROM person_address WHERE identity = ?;";

            // prepared statements variables
            $stmt_identity = null;

            // connection to the server
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );
                
                //
                $stmt->bind_param( "i",  
                                    $stmt_identity );

                //
                $stmt_identity = intval( $model->getIdentity(), 10 );

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getWrapper()->finish();

                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undo_state();
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @return int|mixed
         * @throws Exception
         */
        final public function length(): int
        {
            // return value
            $retVal = CONSTANT_ZERO;
            
            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";

            // opens a connection to the server
            $local_connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $local_connection->prepare( $sql );
                
                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $retVal = $row[ 'number_of_rows' ];
                    }
                }  
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
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

            if( FactoryTemplate::ModelImplements( $classObject, self::getControllerName() ) )
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

            if( FactoryTemplate::ModelImplements( $classObject, self::getViewName() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
        }

    }
?>