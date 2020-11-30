<?php

    /**
     * Class ReCaptchaV2
     */
    class ReCaptchaV2
        extends Security
    {
        /**
         * ReCaptchaV2 constructor.
         * @param $private
         * @param $public
         * @throws Exception
         */
        public function __construct( $private, $public )
        {
            if( is_null( $private ) )
            {
                $this->setSecurityPrivateField(GOOGLE_V2_RECAPTCHA_PRIVATE );
            }
            else
            {
                $this->setSecurityPrivateField( $private );
            }

            if( is_null( $public ) )
            {
                $this->setSecurityPublicField(GOOGLE_V2_RECAPTCHA_PUBLIC );
            }
            else
            {
                $this->setSecurityPublicField( $public );
            }


        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function validateSecurity(): bool
        {
            $retVal = false;

            $this->setResponseKey( PostReCaptchaV2::getPostKey() );
            $this->retrieveResponse();

            if( $this->validate() )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        // Variables
        private $security_public_field  = null;
        private $security_private_field = null;

            // Response
        private $response_key   = null;
        private $response       = null;



        // Functions
        /**
         * @return array|null
         * @throws Exception
         */
        final public function retrieveResponse(): ?array
        {
            $private  = $this->encode( $this->getSecurityPrivateField() );
            $response = $this->encode( $this->getResponseKey() );

            $url = "https://www.google.com/recaptcha/api/siteverify?secret={$private}&response={$response}";

            if( !$this->validUrl( $url ) )
            {
                SecurityErrors::throwErrorUrlIsValid();
            }

            $get_file = file_get_contents( $url );
        
            $this->setResponse( json_decode( $get_file, true ) );
            return $this->getResponse();
        }


        /**
         * @param $str
         * @return string
         * @throws Exception
         */
        private function encode( $str ): string
        {
            if( is_null( $str ) )
            {
                SecurityErrors::throwErrorParameterIsNull();
            }

            if( !is_string( $str ) )
            {
                SecurityErrors::throwErrorParameterIsNotAString();
            }

            return urlencode( $str );
        }


        /**
         * @param $url
         * @return bool
         */
        private function validUrl( $url ): bool
        {
            $retVal = filter_var( $url, FILTER_VALIDATE_URL );

            return boolval( $retVal );
        }


        // Validates the result, if it isn't a success it will throw an error.
        /**
         * @return bool
         * @throws Exception
         */
        final public function validate(): bool
        {
            $retVal = false;

            $result = $this->getResponse();

            if( !$result[ 'success' ] )
            {
                SecurityErrors::throwErrorCapchaFailed();
            }
            else
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        // Accessors
        /**
         * @return string|null
         */
        final public function getSecurityPrivateField(): ?string
        {
            if( is_null( $this->security_private_field ) )
            {
                return null;
            }

            return strval( $this->security_private_field );
        }


        /**
         * @return string|null
         */
        final public function getSecurityPublicField(): ?string
        {
            if( is_null( $this->security_public_field ) )
            {
                return null;
            }

            return strval( $this->security_public_field );
        }


        /**
         * @return array|null
         */
        final public function getResponse(): ?array
        {
            if( is_null( $this->response ) )
            {
                return null;
            }

            return $this->response;
        }


        /**
         * @return string|null
         */
        final public function getResponseKey(): ?string
        {
            if( is_null( $this->response_key ) )
            {
                return null;
            }

            return strval( $this->response_key );
        }

        
        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setSecurityPrivateField( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->security_private_field = null;
                return $this->getSecurityPrivateField();
            }

            if( !is_string( $var ) )
            {
                SecurityErrors::throwErrorParameterIsNotAString();
            }

            $this->security_private_field = strval( $var );
            return $this->getSecurityPrivateField();
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setSecurityPublicField( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->security_public_field = null;
                return $this->getSecurityPublicField();
            }

            if( !is_string( $var ) )
            {
                SecurityErrors::throwErrorParameterIsNotAString();
            }

            $this->security_public_field = strval( $var );
            return $this->getSecurityPublicField();
        }


        /**
         * @param $var
         * @return array|null
         * @throws Exception
         */
        final public function setResponse( $var ): ?array
        {
            if( is_null( $var ) )
            {
                $this->response = null;
                return $this->getResponse();
            }

            if( !is_array( $var ) )
            {
                SecurityErrors::throwErrorParameterIsNotAArray();
            }

            $this->response = $var;
            return $this->getResponse();
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setResponseKey( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->response_key = null;
                return $this->getResponseKey();
            }

            if( !is_string( $var ) )
            {
                SecurityErrors::throwErrorParameterIsNotAString();
            }

            $this->response_key = strval( $var );
            return strval( $this->getResponseKey() );
        }


        /**
         *
         */
        public final static function PrintPublicKey(): void
        {
            $value = htmlentities(GOOGLE_V2_RECAPTCHA_PUBLIC );
            echo "{$value}";
        }

    }

?>