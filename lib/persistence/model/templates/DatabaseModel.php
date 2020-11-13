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

        /**
         * 
         */
        protected function genericNumberValidation( $value )
        {
            if( is_null( $value ) )
            {
                return true;
            }

            if( is_numeric( $value ) )
            {
                return true;
            }

            return false;
        }

        protected function genericStringValidation( $value )
        {
            if( is_null( $value ) )
            {
                return true;
            }

            if( is_string( $value ) )
            {
                return true;
            }

            return false;
        }
    }
?>