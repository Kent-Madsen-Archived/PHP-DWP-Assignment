<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    class PersonAddressFactory 
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

        final public function createModel()
        {
            $model = new PersonAddressModel(this);

            return $model;
        }

        /**
         * 
         */
        final public function validateAsValidModel( $var )
        {
            if( $var instanceof PersonAddressModel )
            {
                return true;
            }

            return false;
        }


        /**
         * 
         */
        final public function read()
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

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
                        $personAddressModel = new PersonAddressModel( $this );

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