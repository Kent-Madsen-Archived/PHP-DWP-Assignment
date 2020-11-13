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
        final public function getFactory()
        {
            return $this->factory;
        }

            // Setters
        /**
         * 
         */
        final public function setFactory( $factory )
        {
            if( !$this->validateFactory( $factory ) )
            {
                throw new Exception( 'Error: Factory instance is of the wrong type. ' );
            }
            
            $this->factory = $factory;
        }

        /**
         * 
         */
        protected abstract function validateFactory( $factory );

        /**
         * 
         */
        final protected function genericNumberValidation( $value )
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

        /**
         * 
         */
        final protected function genericStringValidation( $value )
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

        /**
         * 
         */
        final protected function identityValidation( $value )
        {
            if( $this->genericNumberValidation( $value ) && is_int( $value ) )
            {
                return true;
            }
            
            return false;
        }
    }
?>