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
            $this->setConnector( $mysql_connector );
        }

        /**
         * 
         */
        public function create( $model )
        {
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
                $stmt_name = $model->getStreetName();
                $stmt_street_address_number = $model->getStreetAddressNumber();
                $stmt_zip_code = $model->getZipCode();
                $stmt_country = $model->getCountry();

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


    }

?>