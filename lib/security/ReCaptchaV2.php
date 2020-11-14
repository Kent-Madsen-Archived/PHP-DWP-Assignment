<?php

    /**
     * Class ReCaptchaV2
     * // https://codeforgeek.com/google-recaptcha-tutorial/
     */
    class ReCaptchaV2
    {
        /**
         * ReCaptchaV2 constructor.
         * @param $private
         * @param $public
         */
        public function __construct( $private, $public )
        {
            $this->setSecurityPrivateField( $private );
            $this->setSecurityPublicField( $public );
        }

        // Variables
            //  $secretCapchaKey = GOOGLE_V2_RECAPTCHA_PRIVATE;
        private $security_private_field = null;
        
            // GOOGLE_V2_RECAPTCHA_PUBLIC 
        private $security_public_field = null;

            // 
        private $json_response = null;

            // $_POST['g-recaptcha-response']
        private $response_key = null;

        // Functions
        /**
         *
         */
        final public function retrieve_response()
        {
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode( $this->getSecurityPrivateField() ) .  '&response=' . urlencode( $this->getResponseKey() );

            $get_file = file_get_contents( $url );
        
            $this->setJSONResponse( json_decode( $get_file, true ) );
        }

        // Validates the result, if it isn't a success it will throw an error.

        /**
         * @throws Exception
         */
        final public function validate()
        {
            if( !$this->getJSONResponse()[ 'success' ] ) 
            {
                throw new Exception( 'Security Error: Capcha failed' );
            }
        }

        // globals
        /**
         *
         */
        public static function PrintPublicKey()
        {
            echo GOOGLE_V2_RECAPTCHA_PUBLIC;
        }

        // Accessors

        /**
         * @return null
         */
        final public function getSecurityPrivateField()
        {
            return $this->security_private_field;
        }

        /**
         * @return null
         */
        final public function getSecurityPublicField()
        {
            return $this->security_public_field;
        }

        /**
         * @return null
         */
        final public function getJSONResponse()
        {
            return $this->json_response;
        }

        /**
         * @return null
         */
        final public function getResponseKey()
        {
            return $this->response_key;
        }

        /**
         * @param $var
         */
        final public function setSecurityPrivateField( $var )
        {
            $this->security_private_field = $var;
        }

        /**
         * @param $var
         */
        final public function setSecurityPublicField( $var )
        {
            $this->security_public_field = $var;
        }

        /**
         * @param $var
         */
        final public function setJSONResponse( $var )
        {
            $this->json_response = $var;
        }

        /**
         * @param $var
         */
        final public function setResponseKey( $var )
        {
            $this->response_key = $var;
        }
        
    }

?>