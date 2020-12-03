<?php
    /**
     *  Title: PersonAddressFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

/**
 * Class PersonAddressFactory
 */
    class PersonAddressFactory
        extends BaseFactoryTemplate
    {
        public const table = 'person_address';

        public const field_identity = 'identity';
        public const field_street_name = 'street_name';
        public const field_street_address_number = 'street_address_number';
        public const field_street_address_floor = 'street_address_floor';
        public const field_zip_code = 'zip_code';
        public const field_country = 'country';

        /**
         * PersonAddressFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( ?MySQLConnectorWrapper $mysql_connector )
        {
            $this->setupBase();
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit(CONSTANT_FIVE, CONSTANT_ZERO);
        }


        /**
         * @return string
         */
        public final static function getTableName(): string
        {
            return self::table;
        }


        /**
         * @return string
         */
        public final function getFactoryTableName():string
        {
            return self::table;
        }

        /**
         * @return bool
         * @throws Exception
         */
        public final function exist(): bool
        {
            $status_factory = new StatusOnFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::table );
            
            return $value ;
        }


        /**
         * @return PersonAddressModel
         * @throws Exception
         */
        public final function createModel(): PersonAddressModel
        {
            $model = new PersonAddressModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        public final function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof PersonAddressModel )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return array|null
         * @throws Exception
         */
        public final function read(): ?array
        {
            //
            $retVal = null;

            // SQL Query
            $table = self::table;
            $sql = "SELECT * FROM {$table} LIMIT ? OFFSET ?;";

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

                $stmt_limit = $this->getLimitValue();
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

                        $personAddressModel->setIdentity( $row[ self::field_identity ] );
    
                        $personAddressModel->setStreetAddressName(  $row[ self::field_street_name ]  );
                        $personAddressModel->setStreetAddressNumber( $row[ self::field_street_address_number ] );

                        $personAddressModel->setZipCode(  $row[ self::field_zip_code ]  );
                        $personAddressModel->setCountry(  $row[ self::field_country ]  );

                        $personAddressModel->setStreetAddressFloor( $row[ self::field_street_address_floor ]  );

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
         * @return bool
         * @throws Exception
         */
        public final function readModel( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            //
            $retVal = false;

            // SQL Query
            $table = self::table;
            $fid = self::field_identity;

            $sql = "SELECT * FROM {$table} WHERE {$fid} = ?;";

            //
            $stmt_identity  = null;

            //
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_identity );

                $stmt_identity = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setStreetAddressName(  $row[ self::field_street_name ]  );
                        $model->setStreetAddressNumber( $row[ self::field_street_address_number ] );

                        $model->setZipCode(  $row[ self::field_zip_code ]  );
                        $model->setCountry(  $row[ self::field_country ]  );

                        $model->setStreetAddressFloor( $row[ self::field_street_address_floor ]  );

                        $retVal = true;
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
         * @return mixed
         * @throws Exception
         */
        public final function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return value
            $retVal = false;

            // SQL Query
            $table = self::table;
            $fsn = self::field_street_name;
            $fsan = self::field_street_address_number;
            $fzc = self::field_zip_code;
            $fc = self::field_country;
            $fsaf = self::field_street_address_floor;

            $sql = "INSERT INTO {$table}( {$fsn}, {$fsan}, {$fzc}, {$fc}, {$fsaf} ) VALUES( ?, ?, ?, ?, ? );";

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

                $model = $this->createModel();

                //
                $stmt_name                  =  $model->getStreetAddressName();
                $stmt_street_address_number =  $model->getStreetAddressNumber();
                $stmt_zip_code              =  $model->getZipCode();
                $stmt_country               =  $model->getCountry();

                $stmt_street_floor          =  $model->getStreetAddressFloor();

                // Executes the query
                $stmt->execute();

                $model->setIdentity( $this->getWrapper()->finishCommitAndRetrieveInsertId( $stmt ) );

                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undoState();
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
        public final function update( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return value
            $retVal = false;

            // SQL Query
            $table  = self::table;
            $fsn = self::field_street_name;
            $fsan = self::field_street_address_number;
            $fzc = self::field_zip_code;
            $fc = self::field_country;
            $fsaf = self::field_street_address_floor;

            $fid = self::field_identity;

            $sql = "UPDATE {$table} SET {$fsn} = ?, {$fsan} = ?, {$fzc} = ?, {$fc} = ?, {$fsaf} = ? WHERE {$fid} = ?;";

            // prepared statement variables
            $stmt_street_address_name   = null;
            $stmt_street_address_number = null;
            $stmt_address_floor         = null;

            $stmt_zip_code              = null;
            $stmt_country               = null;

            $stmt_identity              = null;

            // opens a connection to the mysql server
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );
                
                //
                $stmt->bind_param( "sisssi",
                                    $stmt_street_address_name,
                                    $stmt_street_address_number, 
                                    $stmt_zip_code, 
                                    $stmt_country,
                                    $stmt_address_floor,
                                    $stmt_identity );

                //
                $stmt_street_address_name   = $model->getStreetAddressName();
                $stmt_street_address_number = $model->getStreetAddressNumber();
                $stmt_address_floor         = $model->getStreetAddressFloor();

                $stmt_zip_code              = $model->getZipCode();
                $stmt_country               = $model->getCountry();

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
                $this->getWrapper()->undoState();
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
         * @return bool
         * @throws Exception
         */
        public final function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return value
            $retVal = false;

            // SQL Query
            $table = self::table;
            $fid= self::field_identity;
            $sql = "DELETE FROM {$table} WHERE {$fid} = ?;";

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
                $stmt_identity = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getWrapper()->finish();

                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undoState();
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return $retVal;
        }


        /**
         * @return int
         * @throws Exception
         */
        public final function length(): int
        {
            // return value
            $retVal = CONSTANT_ZERO;
            
            $table_name = self::table;
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
         * @param array $filter
         * @return mixed|void
         */
        public final function lengthCalculatedWithFilter(array $filter)
        {
            // TODO: Implement lengthCalculatedWithFilter() method.
        }


        /**
         * @return string
         */
        public final function appendices(): string
        {
            // TODO: Implement appendices() method.
            return "";
        }


        /**
         * @param array $filters
         * @return bool
         */
        public final function insertOptions(array $filters): bool
        {
            // TODO: Implement insertOptions() method.
            return false;
        }

    }
?>