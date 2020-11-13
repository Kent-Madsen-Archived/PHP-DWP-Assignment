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
            $this->connector = $var;
        }

        /**
         * 
         */
        public function validateAsValidConnector( $var )
        {
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
            $this->pagination_index = $idx;
        }

        /**
         * 
         */
        final public function setLimit( $var )
        {
            $this->limit = $var;
        }
    }

?>