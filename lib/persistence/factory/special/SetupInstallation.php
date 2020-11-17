<?php

    /**
     * Class SetupInstallationFactory
     */
    class SetupInstallation
    {
        /**
         * SetupInstallationFactory constructor.
         * @param $connection
         */
        public function __construct( $connection )
        {
            $this->setConnector( $connection );
        }


        // Internal Variables
        private $connector = null;


        /**
         * @param $file
         * @throws Exception
         */
        final public function executeSQLFile( $file_path )
        {
            // Variables used
            // loaded queries from the file
            $file_query = null;
            $retVal     = false;

            $local_connection = null;

            // check if file exist
            if( !file_exists( $file_path ) )
            {
                throw new Exception('SetupInstallationFactory - Inputted file does not exist' );
            }

            // Checks if the files has the sql extension
            $pathInfo = pathinfo( $file_path );

            if( !$pathInfo['extension'] == 'sql')
            {
                throw new Exception('SetupInstallationFactory - Only SQL files are allowed' );
            }

            // loads the file and inserts it, into a string
            $file_query = file_get_contents( $file_path );

            // connects to the database and retrives a instance of the mysqli connector
            $local_connection = $this->getConnector()->connect();

            try
            {
                if( $local_connection->multi_query( $file_query ) )
                {
                    do 
                    {
                        if ( $result = $local_connection->store_result() )
                        {    
                            while ( $row = $result->fetch_row() ) 
                            {
                                var_dump( $row );
                            }

                           $result->free_result();
                        }

                        if( $local_connection->more_results() )
                        {
                            // Do something
                            echo "next";
                        }
                        
                    } while( $local_connection -> next_result() );
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
        final public function installation_status()
        {
            $retVal = false;

            $arrToProcess = array();

            $articleFactory = new ArticleFactory( $this->getConnector() );
            $associatedCategoryFactory = new AssociatedCategoryFactory( $this->getConnector() );

            $broughtFactory = new BroughtFactory( $this->getConnector() );

            $contactfactory = new ContactFactory( $this->getConnector() );

            $imageFactory       = new ImageFactory( $this->getConnector() );
            $imageTypeFactory   = new ImageTypeFactory( $this->getConnector() );

            $pageElementFactory = new PageElementFactory( $this->getConnector() );



            $personAddressFactory   = new PersonAddressFactory( $this->getConnector() );
            $personNameFactory      = new PersonNameFactory( $this->getConnector() );

            $productAttributeFactory    = new ProductAttributeFactory( $this->getConnector() );
            $productCategoryFactory     = new ProductCategoryFactory( $this->getConnector() );
            $productEntityFactory       = new ProductEntityFactory( $this->getConnector() );
            $productFactory             = new ProductFactory( $this->getConnector() );
            $productInvoiceFactory      = new ProductInvoiceFactory( $this->getConnector() );
            $productUsedImageFactory    = new ProductUsedImageFactory( $this->getConnector() );

            $profileFactory             = new ProfileFactory( $this->getConnector() );
            $profileInformationFactory  = new ProfileInformationFactory( $this->getConnector() );
            $profileTypeFactory         = new ProfileTypeFactory( $this->getConnector() );


            array_push( $arrToProcess,
                        $articleFactory, $associatedCategoryFactory,
                        $broughtFactory, $contactfactory,
                        $imageFactory, $imageTypeFactory,
                        $pageElementFactory, $personAddressFactory,
                        $personNameFactory, $productAttributeFactory,
                        $productCategoryFactory, $productEntityFactory,
                        $productFactory, $productInvoiceFactory,
                        $productUsedImageFactory, $profileFactory,
                        $profileInformationFactory, $profileTypeFactory
            );

            $this->process_setup( $arrToProcess );

            return boolval( $retVal );
        }


        /**
         * @param $array
         */
        private function process_setup( $array )
        {
            echo ("<ul>");

            for( $idx = 0;
                 $idx < count( $array );
                 $idx++ )
            {
                $current = $array[$idx];

                $this->printStatus( $current->getFactoryTableName() );

                if( $current->exist() )
                {
                    $this->printRow('table', 'exist');

                    $val = $current->length();
                    $this->printRow('current size', $val);
                }
                else
                {
                    echo ( "<li> Table: does not exist </li>" );
                }
            }

            echo ("</ul>");
        }


        /**
         * 
         */
        private function process_view_setup()
        {

        }


        /**
         * @param $table_name
         */
        private function printStatus( $table_name )
        {
            echo ("<p>currently selected table: {$table_name}</p>");
        }


        /**
         * 
         */
        private function printRow( $key, $value )
        {
            $converted_key = htmlentities( $key );
            $converted_value = htmlentities( $value );
            echo ("<li> {$converted_key}, {$converted_value} </li>");
        }


        // Accessor
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