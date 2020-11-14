<?php

    /**
     * Class DatabaseModel
     */
    abstract class DatabaseModel 
    {
        // Variables
        private $factory = null;

        // accessor functions
            // getters
        /**
         * @return null
         */
        final public function getFactory()
        {
            return $this->factory;
        }

            // Setters

        /**
         * @param $factory
         * @throws Exception
         */
        final public function setFactory( $factory )
        {
            if( is_null( $factory ) )
            {
                $this->factory = $factory;
                return;
            }

            if( !$this->validateFactory( $factory ) )
            {
                throw new Exception( 'Error: Factory instance is of the wrong type. ' );
            }
            
            $this->factory = $factory;
        }

        /**
         * @param $factory
         * @return mixed
         */
        protected abstract function validateFactory( $factory );

        /**
         * @param $value
         * @return bool
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
         * @param $value
         * @return bool
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
         * @param $value
         * @return bool
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