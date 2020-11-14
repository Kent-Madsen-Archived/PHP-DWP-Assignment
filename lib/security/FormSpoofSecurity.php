<?php

    /**
     * Class FormSpoofSecurity
     */
    class FormSpoofSecurity
    {
        // Constructors
        /**
         * FormSpoofSecurity constructor.
         */
        public function __construct()
        {
            $this->generate();
        }

        // Variables
        private $token = null;

        // Stages

        /**
         * @return null
         */
        final public function generate()
        {
            $value = md5( uniqid( mt_rand(), true ) );
            $this->setToken( $value );

            return $this->getToken();
        }

        /**
         *
         */
        final public function apply_to_session()
        {
            $_SESSION[ 'fss_token' ] = $this->getToken();
        }

        // Accessors
        /**
         * @return null
         */
        final public function getToken()
        {
            return $this->token;
        }

        /**
         * @param $var
         */
        final public function setToken( $var )
        {
            $this->token = $var;
        }
    }
?>