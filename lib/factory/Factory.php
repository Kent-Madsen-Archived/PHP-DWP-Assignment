<?php 

    /**
     * 
     */
    abstract class Factory
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