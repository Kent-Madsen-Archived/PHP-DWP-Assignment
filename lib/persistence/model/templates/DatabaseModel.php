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
         * @return mixed
         */
        public abstract function requiredFieldsValidated();


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
            $retVal = false;

            if( is_null( $value ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            if( is_numeric( $value ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
        }


        /**
         * @param $value
         * @return bool
         */
        final protected function genericStringValidation( $value )
        {
            $retVal = false;

            if( is_null( $value ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            if( is_string( $value ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return $retVal;
        }


        /**
         * @param $value
         * @return bool
         */
        final protected function identityValidation( $value )
        {
            $retVal = false;

            if( $this->genericNumberValidation( $value ) && is_int( $value ) )
            {
                $retVal = true;
            }
            
            return boolval( $retVal );
        }


        /**
         * @return int
         */
        final static protected function base()
        {
            return BASE_10;
        }

    }
?>