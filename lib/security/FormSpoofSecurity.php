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
            self::setSessionFSSToken( $this->getToken() );
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
         * @return bool
         */
        public final static function existSessionFSSToken(): bool
        {
            return boolval( isset( $_SESSION[ 'fss_token' ] ) );
        }


        /**
         * @return bool
         */
        public final static function existPostFSSToken(): bool
        {
            return boolval( isset( $_POST[ 'security_token' ] ) );
        }


        /**
         * @return string|null
         */
        public final static function getSessionFSSToken(): ?string
        {
            if( !self::existSessionFSSToken() )
            {
                return null;
            }

            if( is_null( $_SESSION[ 'fss_token' ] ) )
            {
                return null;
            }

            return strval( $_SESSION[ 'fss_token' ] );
        }


        /**
         * @param $value
         * @return string|null
         * @throws Exception
         */
        public final static function setSessionFSSToken( $value ): ?string
        {
            if( is_null( $value ) )
            {
                $_SESSION[ 'fss_token' ] = null;
            }

            if( !is_string( $value ) )
            {
                SecurityErrors::throwErrorInputIsNotAnString();
            }

            $_SESSION[ 'fss_token' ] = $value;
            return self::getSessionFSSToken();
        }


        /**
         * @return string|null
         */
        public final static function getPostFSSToken(): ?string
        {
            if( !self::existPostFSSToken() )
            {
                return null;
            }

            if( is_null( $_POST[ 'security_token' ] ) )
            {
                return null;
            }

            return strval( $_POST[ 'security_token' ] );
        }


        /**
         * @throws Exception
         */
        public final static function printSessionFSSToken(): void
        {
            $fss_token = self::getSessionFSSToken();

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

            if( ( self::getSessionFSSToken() == self::getPostFSSToken() ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }
    }
?>