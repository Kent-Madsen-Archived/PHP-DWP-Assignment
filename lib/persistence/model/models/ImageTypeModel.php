<?php

    /**
     * Class ImageTypeModel
     */
    class ImageTypeModel
        extends DatabaseModel
        implements ImageTypeController,
                   ImageView
    {
        /**
         * ImageTypeModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }

        // implement interfaces
        final public function viewIdentity()
        {

        }

        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return $retVal;
        }

        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return $retVal;
        }
        
        
        // Variables
        private $identity   = null;
        private $content    = null;


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ImageTypeFactory )
            {
                return true;
            }

            return false;
        }


        // accessors
            // getters
        /**
         * @return |null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return |null
         */
        final public function getContent()
        {
            return $this->content;
        }

            // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ImageTypeModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setContent( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ImageTypeModel - setContent: null or string is allowed' );
            }

            $this->content = $var;
        }
    }

?>