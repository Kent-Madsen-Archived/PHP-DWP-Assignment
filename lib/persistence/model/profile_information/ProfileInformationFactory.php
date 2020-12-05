<?php
    /**
    *  Title: ProfileInformationFactory
    *  Author: Kent vejrup Madsen
    *  Type: PHP Script, Class
    *  Project: DWP-Assignment
    */

    /**
     * Class ProfileInformationFactory
     */
    class ProfileInformationFactory
        extends BaseFactoryTemplate
    {
        public const table = 'profile_information';

        public const field_identity             = 'identity';
        public const field_profile_id           = 'profile_id';
        public const field_person_name_id       = 'person_name_id';
        public const field_person_address_id    = 'person_address_id';
        public const field_person_email_id      = 'person_email_id';
        public const field_person_phone         = 'person_phone';
        public const field_birthday             = 'birthday';
        public const field_registered           = 'registered';


        /**
         * ProfileInformationFactory constructor.
         * @param MySQLConnectorWrapper|null $mysql_connector
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
        public final static function getTableName()
        {
            return self::table;
        }


        /**
         * @return string
         */
        public final function getFactoryTableName(): string
        {
            return self::table;
        }


        /**
         * @return bool|mixed
         * @throws Exception
         */
        public final function exist(): bool
        {
            $status_factory = new StatusOnFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return boolval( $value );
        }


        /**
         * @return mixed|ProfileInformationModel
         * @throws Exception
         */
        public final function createModel(): ?ProfileInformationModel
        {
            $model = new ProfileInformationModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        public final function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof ProfileInformationModel )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array|null
         * @throws Exception
         */
        public final function read(): ?array
        {
            $retVal = null;

            $table = self::table;
            $sql = "SELECT * FROM {$table} LIMIT ? OFFSET ?;";

            $stmt_limit = null;
            $stmt_offset = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

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
                        $model = $this->createModel();

                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setProfileId( $row[ self::field_profile_id ] );

                        $model->setPersonNameId( $row[ self::field_person_name_id] );
                        $model->setPersonAddressId(  $row[ self::field_person_address_id ]);
                        $model->setPersonEmailId( $row[ self::field_person_email_id ] );

                        $model->setPersonPhone( $row[ self::field_person_phone ] );
                        $model->setBirthday( $row[ self::field_birthday ]  );

                        $model->setRegistered( $row[ self::field_registered ] );

                        array_push( $retVal, $model );
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
         * @return bool|null
         * @throws Exception
         */
        public final function readModel( &$model ): ?bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            //
            $table = self::table;
            $fpid = self::field_profile_id;

            $sql = "SELECT * FROM {$table} WHERE {$fpid} = ?;";

            $stmt_profile_id = null;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                                    $stmt_profile_id );

                $stmt_profile_id = $model->getProfileId();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setProfileId( $row[ self::field_profile_id ] );

                        $model->setPersonNameId( $row[ self::field_person_name_id ] );
                        $model->setPersonAddressId( $row[ self::field_person_address_id ] );
                        $model->setPersonEmailId( $row[ self::field_person_email_id ] );

                        $model->setPersonPhone(  $row[ self::field_person_phone ] );
                        $model->setBirthday( $row[ self::field_birthday] );

                        $model->setRegistered( $row[ self::field_registered ] );

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
         * @return bool
         * @throws Exception
         */
        public final function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = null;

            $table = self::table;

            $fpid = self::field_profile_id;
            $fpnid = self::field_person_name_id;
            $fpaddr = self::field_person_address_id;
            $fpeid = self::field_person_email_id;
            $fpp = self::field_person_phone;
            $fb = self::field_birthday;

            $sql = "INSERT INTO {$table}( {$fpid}, {$fpnid}, {$fpaddr}, {$fpeid}, {$fpp}, {$fb} ) VALUES( ?, ?, ?, ?, ?, ? );";

            $stmt_profile_id        = null;
            $stmt_person_name_id    = null;
            $stmt_person_address_id = null;
            $stmt_person_email_id   = null;

            $stmt_person_phone      = null;
            $stmt_birthday          = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "iiiiss", 
                                    $stmt_profile_id, 
                                    $stmt_person_name_id,
                                    $stmt_person_address_id,
                                    $stmt_person_email_id,
                                    $stmt_person_phone,
                                    $stmt_birthday );

                //
                $stmt_profile_id        = $model->getProfileId();

                $stmt_person_name_id    = $model->getPersonNameId();
                $stmt_person_address_id = $model->getPersonAddressId();
                $stmt_person_email_id   = $model->getPersonEmailId();

                $stmt_person_phone      = $model->getPersonPhone();
                $stmt_birthday          = $model->getBirthday();

                // Executes the query
                $stmt->execute();

                //
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
            
            return $retVal;
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

            //
            $retVal = null;

            //
            $table = self::table;

            $fpid = self::field_profile_id;
            $fpnid = self::field_person_name_id;
            $fpeid = self::field_person_email_id;
            $fpaid = self::field_person_address_id;

            $fpp = self::field_person_phone;
            $fb = self::field_birthday;

            $fid = self::field_identity;

            $sql = "UPDATE {$table} SET {$fpid} = ?, {$fpnid} = ?, {$fpaid} = ?, {$fpeid} = ?, {$fpp} = ?, {$fb} = ? WHERE {$fid} = ?;";

            //
            $stmt_profile_id = null;

            $stmt_person_name_id    = null;
            $stmt_person_address_id = null;
            $stmt_person_email_id   = null;
            $stmt_person_phone      = null;
            $stmt_birthday          = null;

            $stmt_identity          = null;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "iiiissi",
                                    $stmt_profile_id,
                                    $stmt_person_name_id,
                                    $stmt_person_address_id,
                                    $stmt_person_email_id,
                                    $stmt_person_phone,
                                    $stmt_birthday,
                                    $stmt_identity );

                //
                $stmt_profile_id        = $model->getProfileId();
                
                $stmt_person_name_id    = $model->getPersonNameId();
                $stmt_person_address_id = $model->getPersonAddressId();
                $stmt_person_email_id   = $model->getPersonEmailId();

                $stmt_person_phone      = $model->getPersonPhone();
                $stmt_birthday          = $model->getBirthday();

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
            
            $retVal = false;

            $table = self::table;

            $fid = self::field_identity;

            $sql = "DELETE FROM {$table} WHERE {$fid} = ?;";

            $stmt_identity = null;

            $connection = $this->getWrapper()->connect();

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
            $retVal = CONSTANT_ZERO;
            
            $table_name = self::table;
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";

            $connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );
                
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


        /**
         *
         */
        public final function clearOptions(): void
        {
            // TODO: Implement clearOptions() method.
        }

    }

?>