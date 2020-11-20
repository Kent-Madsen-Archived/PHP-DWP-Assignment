<?php

    /**
     * Class AuthDomainView
     */
    class AuthDomainView
    {
        /**
         * AuthDomainView constructor.
         * @param $domain
         * @throws Exception
         */
        public function __construct( $domain )
        {
            $this->setDomain( $domain );

        }

        // Variables
        private $domain = null;


        /**
         * @param $domain
         * @return AuthDomain|null
         * @throws Exception
         */
        public function setDomain( $domain ): ?AuthDomain
        {
            if( is_null( $domain ) )
            {
                $this->domain = null;
                return $this->getDomain();
            }

            if( !( $domain instanceof AuthDomain ) )
            {
                throw new Exception('');
            }

            $this->domain = $domain;
            return $this->getDomain();
        }


        /**
         * @return AuthDomain|null
         */
        public function getDomain():?AuthDomain
        {
            if( is_null( $this->domain ) )
            {
                return null;
            }

            return $this->domain;
        }


        /**
         * @return bool
         */
        public final function validate(): bool
        {
            $retVal = false;

            try
            {
                $this::validateSecuritySpoof();
                $this::validateSecurityFSS();
                $this::validateSecurityCaptcha();
                $retVal = true;
            }
            catch ( Exception $ex )
            {
                echo $ex;
            }

            return boolval( $retVal );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public static function validateSecurityCaptcha(): bool
        {
            $retVal = false;

            $recaptcha_v2 = new ReCaptchaV2( null, null );

            if( $recaptcha_v2->validateSecurity() )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public static function validateSecuritySpoof(): bool
        {
            $retVal = false;

            $spoof = new SpoofSecurity();

            if( !$spoof->validateSecurity() )
            {
                throw new Exception( 'Empty field is not empty' );
            }
            else
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**7
         * @return bool
         * @throws Exception
         */
        final public static function validateSecurityFSS(): bool
        {
            $retVal = false;

            if( FormSpoofSecurity::existSessionFSSToken() )
            {
                $fss = new FormSpoofSecurity();

                if( !$fss->validateSecurity() )
                {
                    throw new Exception( 'Security Error: FSS Token does not match with its form' );
                }
                else
                {
                    $retVal = true;
                }
            }

            return boolval( $retVal );
        }

    }
?>