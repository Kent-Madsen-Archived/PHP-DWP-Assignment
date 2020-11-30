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
        final public function installationStatus()
        {
            $retVal = false;

            $arrToProcess = array();

            $articleFactory = new ArticleBaseFactoryTemplate( $this->getWrapper() );
            $associatedCategoryFactory = new AssociatedCategoryBaseFactoryTemplate( $this->getWrapper() );

            $broughtFactory = new BroughtBaseFactoryTemplate( $this->getWrapper() );

            $contactfactory = new ContactBaseFactoryTemplate( $this->getWrapper() );

            $imageFactory       = new ImageBaseFactoryTemplate( $this->getWrapper() );
            $imageTypeFactory   = new ImageTypeBaseFactoryTemplate( $this->getWrapper() );

            $pageElementFactory = new PageElementBaseFactoryTemplate( $this->getWrapper() );

            $personAddressFactory   = new PersonAddressBaseFactoryTemplate( $this->getWrapper() );
            $personNameFactory      = new PersonNameBaseFactoryTemplate( $this->getWrapper() );

            $productAttributeFactory    = new ProductAttributeBaseFactoryTemplate( $this->getWrapper() );
            $productCategoryFactory     = new ProductCategoryBaseFactoryTemplate( $this->getWrapper() );
            $productEntityFactory       = new ProductEntityBaseFactoryTemplate( $this->getWrapper() );

            $productFactory             = new ProductBaseFactoryTemplate( $this->getWrapper() );

            $productInvoiceFactory      = new ProductInvoiceBaseFactoryTemplate( $this->getWrapper() );
            $productUsedImageFactory    = new ProductUsedImageBaseFactoryTemplate( $this->getWrapper() );

            $profileFactory             = new ProfileBaseFactoryTemplate( $this->getWrapper() );
            $profileInformationFactory  = new ProfileInformationBaseFactoryTemplate( $this->getWrapper() );
            $profileTypeFactory         = new ProfileTypeBaseFactoryTemplate( $this->getWrapper() );


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

            for( $idx = CONSTANT_ZERO;
                 $idx < count( $array );
                 $idx++ )
            {
                $current = $array[$idx];

                echo "<li>";

                $this->printStatus( $current->getFactoryTableName() );

                if( $current->exist() )
                {
                    $this->printRow( 'table', 'exist' );

                    $val = $current->length();
                    $this->printRow( 'current size', $val );
                }
                else
                {
                    echo ( "<p> Table: does not exist </p>" );
                }

                echo ("</li>");
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
            $var = htmlentities( $table_name );
            echo ("<p> currently selected table: {$var} </p>");
        }


        /**
         * @param $key
         * @param $value
         */
        private function printRow( $key = "Key", $value="Value" )
        {
            $converted_key = htmlentities( $key );
            $converted_value = htmlentities( $value );

            echo ("<p> {$converted_key}, {$converted_value} </p>");
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