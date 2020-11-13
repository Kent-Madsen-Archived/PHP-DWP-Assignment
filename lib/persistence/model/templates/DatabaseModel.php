<?php 
    /**
     * 
     */
    abstract class DatabaseModel 
    {
        // Variables
        private $factory = null;

        // accessor functions
            // getters
        /**
         * 
         */
        public function getFactory()
        {
            return $this->factory;
        }

            // Setters
        /**
         * 
         */
        public function setFactory( $factory )
        {
            $this->factory = $factory;
        }
    }
?>