<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class ArticleFactory 
        extends Factory
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

        // Variables
        private $pagination_index = 0;
        private $limit = 10;


        public function get()
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            //

            $this->getConnector()->disconnect();   
        }

        public function create( $model )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            //

            $this->getConnector()->disconnect();   
        }

        public function update( $model )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            //

            $this->getConnector()->disconnect();
        }

        public function delete( $model )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            //

            $this->getConnector()->disconnect();
        }

        // Accessors
        /**
         * 
         */
        public function getPaginationIndex()
        {
            return $this->pagination_index;
        }

        /**
         * 
         */
        public function getLimit()
        {
            return $this->limit;
        }

        /**
         * 
         */
        public function setPaginationIndex( $idx )
        {
            $this->pagination_index = $idx;
        }

        /**
         * 
         */
        public function setLimit($var)
        {
            $this->limit = $var;
        }


    }

?>