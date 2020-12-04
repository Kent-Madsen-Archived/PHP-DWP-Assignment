<?php

    abstract class AuthForm
    {
        /**
         * @return bool
         * @throws Exception
         */
        public final static function validateSecurityCaptcha(): bool
        {
            $retVal = false;

            $recaptcha_v2 = new ReCaptchaV2( null, null );

            if( $recaptcha_v2->validateSecurity() )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final static function validateSecuritySpoof(): bool
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

            return $retVal;
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final static function validateSecurityFSS(): bool
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

            return $retVal;
        }

    }

?>