<?php

    /**
     * Class ContactForm
     */
    abstract class ContactForm
    {
        /**
         * @param $mail
         * @return bool|null
         * @throws Exception
         */
        final protected static function validateIsMail( $mail ): ?bool
        {
            $value = false;

            if( filter_var( $mail, FILTER_VALIDATE_EMAIL ) )
            {
                $value = true;
            }
            else
            {
                throw new Exception('');
            }

            return boolval( $value );
        }


        /**
         * @return bool
         */
        final public static function validateIsSubmitted(): bool
        {
            $retVal = false;

            if( isset( $_POST[ 'form_contact_submit' ] ) )
            {
                $retVal = true;
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


        /**
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


        // Accessors
        /**
         * @return string|null
         */
        final static public function getFormSubject(): ?string
        {
            $value = $_POST[ 'form_contact_subject' ];

            $sanitized_value = filter_var( $value, FILTER_SANITIZE_STRING );

            return $sanitized_value;
        }


        /**
         * @return string|null
         */
        final static public function getFormMessage(): ?string
        {
            $value = $_POST[ 'form_contact_message' ];

            $sanitized_value = filter_var( $value, FILTER_SANITIZE_STRING );

            return strval( $sanitized_value );
        }


        /**
         * @return string|null
         * @throws Exception
         */
        final public static function getFormFromMail(): ?string
        {
            $fromMail = $_POST[ 'form_contact_from' ];
            $sanitizedFromMail = filter_var( $fromMail, FILTER_SANITIZE_EMAIL );

            if( self::validateIsMail( $sanitizedFromMail ) )
            {
                return strval( $sanitizedFromMail );
            }

            return null;
        }


        /**
         * @return string|null
         * @throws Exception
         */
        final public static function getFormToMail(): ?string
        {
            $toMailFromForm = WEBPAGE_DEFAULT_MAILTO;
            $sanitizedToMail = filter_var( $toMailFromForm, FILTER_SANITIZE_EMAIL );

            if( self::validateIsMail( $sanitizedToMail ) )
            {
                return strval( $sanitizedToMail );
            }

            return null;
        }

    }
?>