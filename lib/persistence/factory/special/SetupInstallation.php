<?php
    /**
     *  Title: SetupInstallationFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class SetupInstallationFactory
     */
    class SetupInstallation
    {
        /**
         * SetupInstallation constructor.
         * @param $connection
         */
        public function __construct( $connection )
        {
            $this->setWrapper( $connection );
        }


        // Internal Variables
        private $wrapper = null;


        /**
         * @param $file_path
         * @return bool
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
            $local_connection = $this->getWrapper()->connect();

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

            return boolval( $retVal );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function installation_status()
        {
            $retVal = false;

            $arrToProcess = array();

            $articleFactory = new ArticleFactory( $this->getWrapper() );
            $associatedCategoryFactory = new AssociatedCategoryFactory( $this->getWrapper() );

            $broughtFactory = new BroughtFactory( $this->getWrapper() );

            $contactfactory = new ContactFactory( $this->getWrapper() );

            $imageFactory       = new ImageFactory( $this->getWrapper() );
            $imageTypeFactory   = new ImageTypeFactory( $this->getWrapper() );

            $pageElementFactory = new PageElementFactory( $this->getWrapper() );



            $personAddressFactory   = new PersonAddressFactory( $this->getWrapper() );
            $personNameFactory      = new PersonNameFactory( $this->getWrapper() );

            $productAttributeFactory    = new ProductAttributeFactory( $this->getWrapper() );
            $productCategoryFactory     = new ProductCategoryFactory( $this->getWrapper() );
            $productEntityFactory       = new ProductEntityFactory( $this->getWrapper() );
            $productFactory             = new ProductFactory( $this->getWrapper() );
            $productInvoiceFactory      = new ProductInvoiceFactory( $this->getWrapper() );
            $productUsedImageFactory    = new ProductUsedImageFactory( $this->getWrapper() );

            $profileFactory             = new ProfileFactory( $this->getWrapper() );
            $profileInformationFactory  = new ProfileInformationFactory( $this->getWrapper() );
            $profileTypeFactory         = new ProfileTypeFactory( $this->getWrapper() );


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
            echo ("<p>currently selected table: { $table_name }</p>");
        }


        /**
         * @param $key
         * @param $value
         */
        private function printRow( $key = "Key", $value="Value" )
        {
            $converted_key = htmlentities( $key );
            $converted_value = htmlentities( $value );

            echo ("<li> { $converted_key }, { $converted_value } </li>");
        }


        // Accessor
        /**
         * @return MySQLConnectorWrapper|null
         */
        final public function getWrapper(): ?MySQLConnectorWrapper
        {
            return $this->wrapper;
        }


        /**
         * @param $wrapper
         * @return MySQLConnectorWrapper|null
         */
        final public function setWrapper( $wrapper ): ?MySQLConnectorWrapper
        {
            $this->wrapper = $wrapper;

            return $this->getWrapper();
        }

    }

?>