<?php 

    /**
     * 
     */
    class ContactModel 
        extends DatabaseModel
        implements ContactController, 
                ContactView
    {
        //
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $message = null;
        private $subject = null;

        private $fromMail = null;
        private $toMail = null;

        private $has_been_send = null;
        private $created_on = null;

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
            $this->identity = $var;
        }

        /**
         * 
         */
        public function setHasBeenSend( $var )
        {
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
            $this->subject = $var;
        }

        /**
         * 
         */
        public function setMessage( $var )
        {
            $this->message = $var;
        }

        public function getHasBeenSendAsInt()
        {
            if( $this->getHasBeenSend() )
            {
                return 1;
            }
            else 
            {
                return 0;
            }
        }

    }
?>