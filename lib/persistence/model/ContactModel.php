<?php 

    /**
     * 
     */
    class ContactModel 
        extends DatabaseModel
            implements ContactController, 
                       ContactView
    {
        // Constructors
        /**
         * 
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


        // Variables
        private $message = null;
        private $subject = null;

        private $fromMail = null;
        private $toMail   = null;

        private $has_been_send = null;
        private $created_on    = null;

        private $identity  = 0;


        // implementation of factory classes
        /**
         * 
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
         * 
         */
        final public function getMessage()
        {
            return $this->message;
        }

        /**
         * 
         */
        final public function getToMail()
        {
            return $this->toMail;
        }

        /**
         * 
         */
        final public function getSubject()
        {
            return $this->subject;
        }

        /**
         * 
         */
        final public function getFromMail()
        {
            return $this->fromMail;
        }

        /**
         * 
         */
        final public function getCreatedOn()
        {
            return $this->created_on;
        }

        /**
         * 
         */
        final public function getHasBeenSend()
        {
            return $this->has_been_send;
        }

        /**
         * 
         */
        final public function getIdentity()
        {
            return $this->identity;
        }

            // Setters
        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ContactModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
        }

        /**
         * 
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
         * 
         */
        final public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }

        /**
         * 
         */
        final public function setFromMail( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setIdentity: null or numeric number is allowed' );
            }

            $this->fromMail = $var;
        }

        /**
         * 
         */
        final public function setToMail( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setIdentity: null or numeric number is allowed' );
            }

            $this->toMail = $var;
        }

        /**
         * 
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
         * 
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