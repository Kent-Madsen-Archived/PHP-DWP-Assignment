<?php
    /**
     *  Title: ContactDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ContactDomain
     */
    class ContactDomain
        extends Domain
            implements ContactInteraction
    {
        public const class_name = "ContactDomain";


        // Construct
        /**
         * ContactDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name);
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function makeReadyForSending(): bool
        {
            $retVal = false;

            $security = $this->validateSecurity();

            if( !$security )
            {
                return boolval( $retVal );
            }

            // Factories prepared
            $peFactory = $this->getContactFactory();
            $contact_model = $peFactory->createModel();

            $contact_model->setSubject( ContactForm::getFormSubject() );
            $contact_model->setMessage( ContactForm::getFormMessage() );

            $peModelFrom = $this->getMailOrCreateModel( ContactForm::getFormFromMail() );
            $peModelTo   = $this->getMailOrCreateModel( ContactForm::getFormToMail() );

            $contact_model->setFromMail( $peModelFrom->getIdentity() );
            $contact_model->setToMail( $peModelTo->getIdentity() );

            $contact_model->setHasBeenSend( CONSTANT_ZERO );

            // Upload model
            if( $peFactory->create( $contact_model ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @param $wrapper
         * @param $mail_content
         * @return PersonEmailModel|null
         * @throws Exception
         */
        final protected function getMailOrCreateModel( $mail_content ): ?PersonEmailModel
        {
            if( !is_string( $mail_content ) )
            {
                throw new Exception('getMailOrCreateModel - $mail_content is not a string');
            }

            $factory = $this->getPersonEmailFactory();

            $mailModel = $factory->createModel();
            $mailModel->setContent( $mail_content );

            if( $factory->validateIfMailExist( $mailModel ) )
            {
                $factory->readModelByName( $mailModel );
            }
            else 
            {
                $factory->create( $mailModel );
            }

            return $mailModel;
        }


        /**
         * @return bool
         */
        final public function validateSecurity(): bool
        {
            $retVal = false;

            try
            {
                $spoof      = ContactForm::validateSecuritySpoof();
                $fss        = ContactForm::validateSecurityFSS();
                $captcha    = ContactForm::validateSecurityCaptcha();

                $retVal = ( $spoof && $fss && $captcha );
            }
            catch ( Exception $ex )
            {
                echo $ex;
            }

            return boolval( $retVal );
        }


        /**
         * @return ContactFactory
         * @throws Exception
         */
        protected function getContactFactory(): ContactFactory
        {
            return GroupContact::getContactFactory();
        }


        /**
         * @return PersonEmailFactory
         * @throws Exception
         */
        protected function getPersonEmailFactory(): PersonEmailFactory
        {
            return GroupAuthentication::getPersonEmailFactory();
        }

    }

?>