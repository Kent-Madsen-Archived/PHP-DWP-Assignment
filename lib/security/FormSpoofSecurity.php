<?php
    /**
     * 
     */
    class FormSpoofSecurity
    {
        // Constructors
        function __construct()
        {
            $this->generate();
        }

        // Variables
        private $token = null;

        // Stages
        function generate()
        {
            $value = md5( uniqid( mt_rand(), true ) );
            $this->setToken( $value );

            return $this->getToken();
        }

        function apply_to_session()
        {
            $_SESSION[ 'fss_token' ] = $this->getToken();
        }

        // Accessors
        public function getToken()
        {
            return $this->token;
        }

        public function setToken( $var )
        {
            $this->token = $var;
        }
    }
?>