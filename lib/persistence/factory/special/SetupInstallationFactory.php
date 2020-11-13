<?php 

    /**
     * 
     */
    class SetupInstallationFactory
    {
        /**
         * 
         */
        public function __construct( $connection )
        {
            $this->setConnector( $connection );
        }

        /**
         * 
         */
        public function installation()
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
         * 
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
         * 
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
         * 
         */
        public function getConnector()
        {
            return $this->connector;
        }

        /**
         * 
         */
        public function setConnector( $connector )
        {
            $this->connector = $connector;
        }
    }

?>