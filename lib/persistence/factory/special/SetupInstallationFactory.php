<?php

    /**
     * Class SetupInstallationFactory
     */
    class SetupInstallationFactory
    {
        /**
         * SetupInstallationFactory constructor.
         * @param $connection
         */
        public function __construct( $connection )
        {
            $this->setConnector( $connection );
        }


        /**
         * @param $file
         * @throws Exception
         */
        final public function executeSQLFile( $file_path )
        {
            // loaded queries from the file
            $file_query = null;

            $retVal     = false;

            if( !file_exists( $file_path ) )
            {
                return boolval( $retVal );
            }

            $pathInfo = pathinfo( $file_path );
            var_dump( $pathInfo );

            if( !$pathInfo['extension'] == 'sql')
            {

            }

            $file_query = file_get_contents( $file_path );

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }
            
            try
            {
                if( $connection->multi_query( $file_query ) )
                {
                    do 
                    {
                        if ( $result = $connection->store_result() ) 
                        {    
                            while ( $row = $result->fetch_row() ) 
                            {
                                var_dump( $row );
                            }

                           $result->free_result();
                        }

                        if( $connection->more_results() )
                        {
                            // Do something
                            echo "";
                        }
                        
                    } while( $connection -> next_result() );
                }

                // commits the statement
                $this->getConnector()->finish();

                $retVal = true;
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

            return boolval( $retVal );
        }

        /**
         * @throws Exception
         */
        final public function installation()
        {
            $arrToProcess = array();

            $factory = new ArticleFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new AssociatedCategoryFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new BroughtFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ContactFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ImageFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ImageTypeFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new PageElementFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new PersonAddressFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new PersonNameFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ProductAttributeFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ProductCategoryFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ProductEntityFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ProductFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ProductInvoiceFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ProductUsedImageFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ProductUsedImageFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ProfileFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );
            
            $factory = new ProfileInformationFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );

            $factory = new ProfileTypeFactory( $this->getConnector() );
            array_push( $arrToProcess, $factory );

            $this->process_setup( $arrToProcess );
        }

        /**
         * @param $array
         */
        private function process_setup( $array )
        {
            foreach( $array as &$value )
            {
                echo "Table : " . $value->getFactoryTableName() . "</br>";

                if( $value->exist_database() )
                {
                    echo "-- state: exists </br>";
                }
                else 
                {
                    echo "-- state: doesn't exists </br>";
                }

                echo "</br>";
            }

            $this->process_secondaries( $array );
        }

        /**
         * @param $array
         */
        private function process_secondaries( $array )
        {
            foreach( $array as &$value )
            {
                echo "Table : " . $value->getFactoryTableName() . "</br>";

                if( $value->exist_database() )
                {
                    echo "-- state: exists </br>";
                }
                else 
                {
                    echo "-- state: doesn't exists </br>";
                }

                echo "</br>";
            }
        }

        // Variables
        private $connector = null;

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