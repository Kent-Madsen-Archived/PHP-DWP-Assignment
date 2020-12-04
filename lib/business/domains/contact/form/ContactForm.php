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
        protected final static function validateIsMail( $mail ): ?bool
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

            return $value;
        }


        /**
         * @return bool
         */
        public final static function validateIsSubmitted(): bool
        {
            $retVal = false;

            if( isset( $_POST[ 'form_contact_submit' ] ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


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

            if( SessionFormSpoofSecurityForm::existSessionFSSToken() )
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


        // Accessors
        /**
         * @return string|null
         */
        public final static function getFormSubject(): ?string
        {
            $value = $_POST[ 'form_contact_subject' ];

            $sanitized_value = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );

            return $sanitized_value;
        }


        /**
         * @return string|null
         */
        public final static function getFormMessage(): ?string
        {
            $value = $_POST[ 'form_contact_message' ];

            $sanitized_value = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );

            return $sanitized_value;
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final static function getFormFromMail(): ?string
        {
            $fromMail = $_POST[ 'form_contact_from' ];
            $sanitizedFromMail = filter_var( $fromMail, FILTER_SANITIZE_EMAIL, FILTER_NULL_ON_FAILURE );

            if( self::validateIsMail( $sanitizedFromMail ) )
            {
                return $sanitizedFromMail;
            }

            return null;
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final static function getFormToMail(): ?string
        {
            $toMailFromForm = WEBPAGE_DEFAULT_MAILTO;
            $sanitizedToMail = filter_var( $toMailFromForm, FILTER_SANITIZE_EMAIL, FILTER_NULL_ON_FAILURE );

            if( self::validateIsMail( $sanitizedToMail ) )
            {
                return $sanitizedToMail;
            }

            return null;
        }

    }
?>