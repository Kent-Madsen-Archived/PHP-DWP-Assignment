<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Class ProfileInformationFactory
     */
    class ProfileInformationFactory 
        extends Factory
    {
        /**
         * @return string
         */
        final public static function getTableName()
        {
            return 'profile_information';
        }


        /**
         * @return mixed|string
         */
        final public function getFactoryTableName()
        {
            return self::getTableName();
        }


        /**
         * ProfileInformationFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }


        /**
         * @return string
         */
        final public static function getViewName()
        {
            return 'ProfileInformationView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'ProfileInformationController';
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
         * @return bool|mixed
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
         * @return mixed|ProfileInformationModel
         */
        final public function createModel()
        {
            $model = new ProfileInformationModel( $this );

            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var )
        {
            $retVal = false;

            if( $var instanceof ProfileInformationModel )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array|mixed
         * @throws Exception
         */
        final public function read()
        {
            $retVal = array();

            $connection = $this->getConnector()->connect();

            $sql = "SELECT * FROM profile_information LIMIT ? OFFSET ?;";

            $stmt_limit = null;
            $stmt_offset = null;

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
                        $model = $this->createModel();

                        $model->setIdentity( $row[ 'identity' ] );
                        $model->setProfileId( $row[ 'profile_id' ] );

                        $model->setPersonNameId( $row[ 'person_name_id' ] );
                        $model->setPersonAddressId( $row[ 'person_address_id' ] );
                        $model->setPersonEmailId( $row[ 'person_email_id' ] );

                        $model->setPersonPhone( $row[ 'person_phone' ] );
                        $model->setBirthday( $row[ 'birthday' ] );

                        $model->setRegistered( $row[ 'registered' ] );

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
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }


        /**
         * @param $model
         * @return mixed|null
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
         * @return ProfileInformationModel
         * @throws Exception
         */
        final public function read_by_profile_id( $model )
        {
            $retVal = $model;

            $connection = $this->getConnector()->connect();

            $sql = "SELECT * FROM profile_information WHERE profile_id = ?;";

            $stmt_profile_id = null;

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                                    $stmt_profile_id );

                $stmt_profile_id = $model->getProfileId();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( $row[ 'identity' ] );
                        $model->setProfileId( $row[ 'profile_id' ] );

                        $model->setPersonNameId( $row[ 'person_name_id' ] );
                        $model->setPersonAddressId( $row[ 'person_address_id' ] );
                        $model->setPersonEmailId( $row[ 'person_email_id' ] );

                        $model->setPersonPhone( $row[ 'person_phone' ] );
                        $model->setBirthday( $row[ 'birthday' ] );

                        $model->setRegistered( $row[ 'registered' ] );

                        $retVal = $model;
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

            $retVal = null;

            $connection = $this->getConnector()->connect();

            $sql = "INSERT INTO profile_information( profile_id, person_name_id, person_address_id, person_email_id, person_phone, birthday ) VALUES( ?, ?, ?, ?, ?, ? );";

            $stmt_profile_id        = null;
            $stmt_person_name_id    = null;
            $stmt_person_address_id = null;
            $stmt_person_email_id   = null;

            $stmt_person_phone      = null;
            $stmt_birthday          = null;

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

            $sql = "UPDATE profile_information SET profile_id = ?, person_name_id = ?, person_address_id = ?, person_email_id = ?, person_phone = ?, birthday = ? WHERE identity = ?;";

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
         * @return bool|mixed
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

            $sql = "DELETE FROM profile_information WHERE identity = ?;";

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
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
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