<?php

    /**
     * Class PersonEmailModel
     */
    class PersonEmailModel 
        extends DatabaseModel
            implements PersonEmailController, 
                       PersonEmailView
    {
        // Constructor
        /**
         * PersonEmailModel constructor.
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
        private $identity = null;
        private $content  = null;
        

        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof PersonEmailFactory )
            {
                return true;
            }

            return false;
        }


        // accessors
            // getters
        /**
         * @return mixed|null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return mixed|null
         */
        final public function getContent()
        {
            return $this->content;
        }


            // Setters
        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonEmailModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
        }


        /**
         * @param $var
         * @return mixed|void
         */
        final public function setContent( $var )
        {
            $this->content = $var;
        }

    }

?>