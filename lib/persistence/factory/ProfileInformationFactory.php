<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    class ProfileInformationFactory 
        extends Factory
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            if( !$this->validateAsValidConnector( $mysql_connector ) )
            {
                throw new Exception( 'Not a valid connector' );
            }

            $this->setConnector( $mysql_connector );
        }

        /**
         * 
         */
        final public function validateAsValidModel( $var )
        {
            if( $var instanceof ProfileInformationModel )
            {
                return true;
            }

            return false;
        }

        
        /**
         * 
         */
        final public function read( )
        {
            
        }


        /**
         * 
         */
        final public function create( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "INSERT INTO profile_information( profile_id, person_name_id, person_address_id, person_email_id, person_phone, birthday ) VALUES( ?, ?, ?, ?, ?, ? );";

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "iiiiss", 
                                    $stmt_profile_id, 
                                    $stmt_person_name_id,
                                    $stmt_person_address_id,
                                    $stmt_person_email_id,
                                    $stmt_person_phwhereone,
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

                echo $ex;
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }
            
            return $retVal;
        }


        /**
         * 
         */
        final public function update( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

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

                echo $ex;
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }


        /**
         * 
         */
        final public function delete( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = null;

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

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

                echo $ex;
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }

    }

?>