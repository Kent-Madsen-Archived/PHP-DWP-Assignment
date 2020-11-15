<?php

    /**
     * Class ContactModel
     */
    class ContactModel 
        extends DatabaseModel
            implements ContactController, 
                       ContactView
    {
        // Constructors
        /**
         * ContactModel constructor.
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
        private $message = null;
        private $subject = null;

        private $fromMail = null;
        private $toMail   = null;

        private $has_been_send = null;
        private $created_on    = null;

        private $identity = null;


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ContactFactory )
            {
                return true;
            }

            return false;
        }

        // Accessor
            // Getters

        /**
         * @return mixed|null
         */
        final public function getMessage()
        {
            return $this->message;
        }

        /**
         * @return mixed|null
         */
        final public function getToMail()
        {
            return $this->toMail;
        }

        /**
         * @return mixed|null
         */
        final public function getSubject()
        {
            return $this->subject;
        }

        /**
         * @return mixed|null
         */
        final public function getFromMail()
        {
            return $this->fromMail;
        }

        /**
         * @return mixed|null
         */
        final public function getCreatedOn()
        {
            return $this->created_on;
        }

        /**
         * @return mixed|null
         */
        final public function getHasBeenSend()
        {
            return $this->has_been_send;
        }

        /**
         * @return int|mixed
         */
        final public function getIdentity()
        {
            return $this->identity;
        }

            // Setters

        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ContactModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $value;
        }

        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setHasBeenSend( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'ContactModel - setHasBeenSend: null or numeric number is allowed' );
            }

            $this->has_been_send = $var;
        }

        /**
         * @param $var
         * @return mixed|void
         */
        final public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }

        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setFromMail( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'BroughtProductModel - setIdentity: null or numeric number is allowed' );
            }

            $this->fromMail = $value;
        }

        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setToMail( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'BroughtProductModel - setIdentity: null or numeric number is allowed' );
            }

            $this->toMail = $value;
        }

        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setSubject( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ContactModel - setSubject: null or string is allowed' );
            }

            $this->subject = $var;
        }

        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setMessage( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ContactModel - setMessage: null or string is allowed' );
            }

            $this->message = $var;
        }

    }
?>