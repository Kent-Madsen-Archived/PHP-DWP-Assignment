<?php

    /**
     * Class ContactModel
     */
    class ContactModel
        extends DatabaseModelEntity
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


        /**
         * @return bool
         */
        final public function requiredFieldsValidated(): bool
        {
            $subject_title_has_input = !is_null($this->subject);
            $message_has_input = !is_null($this->message);

            $to_id_has_input = !is_null($this->toMail);
            $from_id_has_input = !is_null($this->fromMail);

            $retVal = ($subject_title_has_input && $message_has_input && $to_id_has_input && $from_id_has_input);

            return boolval( $retVal );
        }


        // Variables
        private $message = null;
        private $subject = null;

        private $fromMail = null;
        private $toMail   = null;

        private $has_been_send = null;
        private $created_on    = null;


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

            return intval( $this->toMail, BASE_10 );
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

            return intval( $this->fromMail, BASE_10 );
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

            return intval( $this->has_been_send,  BASE_10 );
        }



        // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setHasBeenSend( $var )
        {
            if( !is_int( $var ) )
            {
                throw new Exception( 'ContactModel - setHasBeenSend: null or numeric number is allowed' );
            }

            $this->has_been_send = intval( $var, BASE_10 );
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
            if( !is_int( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setIdentity: null or numeric number is allowed' );
            }

            $this->fromMail = intval( $var, BASE_10 );
        }


        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setToMail( $var )
        {
            if( !is_int( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setIdentity: null or numeric number is allowed' );
            }

            $this->toMail = intval( $var, BASE_10 );
        }


        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setSubject( $var )
        {
            if( !is_string( $var ) )
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
            if( !is_string( $var ) )
            {
                throw new Exception( 'ContactModel - setMessage: null or string is allowed' );
            }

            $this->message = $var;
        }
    }
?>