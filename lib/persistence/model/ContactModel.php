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
        function __construct( $factory )
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

        // Accessor
            // Getters

        /**
         * 
         */
        public function getMessage()
        {
            return $this->message;
        }

        /**
         * 
         */
        public function getToMail()
        {
            return $this->toMail;
        }

        /**
         * 
         */
        public function getSubject()
        {
            return $this->subject;
        }

        /**
         * 
         */
        public function getFromMail()
        {
            return $this->fromMail;
        }

        /**
         * 
         */
        public function getCreatedOn()
        {
            return $this->created_on;
        }

        /**
         * 
         */
        public function getHasBeenSend()
        {
            return $this->has_been_send;
        }

        /**
         * 
         */
        public function getIdentity()
        {
            return $this->identity;
        }

            // Setters
        /**
         * 
         */
        public function setIdentity( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'ContactModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
        }

        /**
         * 
         */
        public function setHasBeenSend( $var )
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
        public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }

        /**
         * 
         */
        public function setFromMail( $var )
        {
            
            $this->fromMail = $var;
        }

        /**
         * 
         */
        public function setToMail( $var )
        {
            $this->toMail = $var;
        }

        /**
         * 
         */
        public function setSubject( $var )
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
        public function setMessage( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ContactModel - setMessage: null or string is allowed' );
            }

            $this->message = $var;
        }

    }
?>