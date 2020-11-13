<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    abstract class Factory
        implements CRUD
    {
        //
        private $connector = null;
        
        // Useful when implementing pagination
        private $pagination_index = 0;
        private $limit = 5;

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
        public function setConnector( $var )
        {
            if( !$this->validateAsValidConnector( $var ) )
            {
                throw new Exception( "Factory - setConnector: Only class MySQLConnector or null is allowed" );
            }

            $this->connector = $var;
        }

        /**
         * 
         */
        protected function validateAsValidConnector( $var )
        {
            if( is_null( $var ) )
            {
                return true;
            }

            if( $var instanceof MySQLConnector )
            {
                return true;
            }

            return false;
        }

        // Accessors
            // Getters
        final public function calculateOffset()
        {
            return $this->getLimit() * $this->getPaginationIndex();
        }

        /**
         * 
         */
        final public function getPaginationIndex()
        {
            return $this->pagination_index;
        }

        /**
         * 
         */
        final public function getLimit()
        {
            return $this->limit;
        }

            // Setters
        /**
         * 
         */
        final public function setPaginationIndex( $idx )
        {
            if( $idx == null || is_numeric( $idx ) )
            {
                $this->pagination_index = $idx;
            }
            else
            {
                throw new Exception( 'Factory - setPaginationIndex: only numeric characters or null is allowed' );
            }
        }

        /**
         * 
         */
        final public function setLimit( $var )
        {
            if( is_null( $var ) || is_numeric( $var ) )
            {
                $this->limit = $var;
            }
            else 
            {
                throw new Exception( 'Factory - setLimit: only numeric characters or null is allowed' );   
            }
        }
    }

?>