<?php

    /**
     * Class FormSpoofSecurity
     */
    class FormSpoofSecurity
        extends Security
    {
        // Constructors
        /**
         * FormSpoofSecurity constructor.
         * @throws Exception
         */
        public function __construct()
        {

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
         * @return bool
         */
        final public function validateSecurity(): bool
        {
            $retVal = false;

            if( $this::validateFSS() )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @throws Exception
         */
        final public function applyToSession(): void
        {
            SessionFormSpoofSecurityForm::setSessionFSSToken( $this->getToken() );
        }


        // Accessors
        /**
         * @return string|null
         */
        final public function getToken(): ?string
        {
            if( is_null( $this->token ) )
            {
                return null;
            }

            return strval( $this->token );
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setToken( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->token = null;
                return $this->getToken();
            }

            if( !is_string( $var ) )
            {
                SecurityErrors::throwErrorInputIsNotAnString();
            }

            $this->token = strval( $var );
            return $this->getToken();
        }


        /**
         * @throws Exception
         */
        public final static function printSessionFSSToken(): void
        {
            $fss_token = SessionFormSpoofSecurityForm::getSessionFSSToken();

            if( is_null( $fss_token ) )
            {
                SecurityErrors::throwErrorTokenIsNull();
            }

            $token_filtered = htmlentities( $fss_token );
            $value = "value=\"{$token_filtered}\"";

            echo $value;
        }


        /**
         * @return bool
         */
        private final static function validateFSS(): bool
        {
            $retVal = false;

            if( ( SessionFormSpoofSecurityForm::getSessionFSSToken() == PostFormSpoofSecurityForm::getPostFSSToken() ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


    }
?>