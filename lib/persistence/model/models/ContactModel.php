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
        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
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
            $retVal = false;

            if( $factory instanceof ContactFactory )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        // Accessor
            // Getters
        /**
         * @return mixed|string|null
         */
        final public function getMessage()
        {
            if( is_null( $this->message ) )
            {
                return null;
            }

            return strval( $this->message );
        }


        /**
         * @return int|mixed|null
         */
        final public function getToMail()
        {
            if( is_null( $this->toMail ) )
            {
                return null;
            }

            return intval( $this->toMail, self::base() );
        }


        /**
         * @return mixed|string|null
         */
        final public function getSubject()
        {
            if( is_null( $this->subject ) )
            {
                return null;
            }

            return strval( $this->subject );
        }


        /**
         * @return int|mixed|null
         */
        final public function getFromMail()
        {
            if( is_null( $this->fromMail ) )
            {
                return null;
            }

            return intval( $this->fromMail, self::base() );
        }


        /**
         * @return mixed|null
         */
        final public function getCreatedOn()
        {
            return $this->created_on;
        }


        /**
         * @return int|mixed|null
         */
        final public function getHasBeenSend()
        {
            if( is_null( $this->has_been_send ) )
            {
                return null;
            }

            return intval( $this->has_been_send, self::base() );
        }


        /**
         * @return int|mixed|null
         */
        final public function getIdentity()
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return intval( $this->identity, self::base() );
        }


            // Setters
        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

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
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

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
            $value = filter_var( $var, FILTER_VALIDATE_INT );

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