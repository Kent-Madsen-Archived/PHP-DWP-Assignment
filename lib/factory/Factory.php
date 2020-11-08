<?php 

    /**
     * 
     */
    abstract class Factory
        implements CRUD
    {
        //
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
        public function setConnector( $var )
        {
            $this->connector = $var;
        }
    }

?>