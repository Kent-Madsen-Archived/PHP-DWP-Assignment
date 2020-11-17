<?php

    /**
     * Class FormSpoofSecurity
     */
    class FormSpoofSecurity
    {
        // Constructors
        /**
         * FormSpoofSecurity constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->generate();
        }


        // Variables
        private $token = null;


        // Stages
        /**
         * @return string
         * @throws Exception
         */
        final public function generate(): string
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
         * @return string|null
         */
        final public function getToken(): ?string
        {
            return $this->token;
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setToken( $var ): ?string
        {
            if( !is_string( $var ) )
            {
                throw new Exception('Input token is not a string');
            }

            $this->token = strval( $var );

            return $this->getToken();
        }
    }
?>