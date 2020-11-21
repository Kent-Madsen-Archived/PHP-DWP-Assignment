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
    {
        // Construct
        /**
         * ContactDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );   
            $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );

            $database = WEBPAGE_DATABASE_NAME;

            $this->setInformation( new MySQLInformation( $access, $user_credential, $database ) );
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

            //
            $connection = new MySQLConnectorWrapper( $this->getInformation() );

            // Factories prepared
            $peFactory = new ContactFactory( $connection );
            $contact_model = $peFactory->createModel();

            $contact_model->setSubject( ContactDomainView::getFormSubject() );
            $contact_model->setMessage( ContactDomainView::getFormMessage() );

            $peModelFrom = $this->getMailOrCreateModel( $connection, ContactDomainView::getFormFromMail() );
            $peModelTo   = $this->getMailOrCreateModel( $connection, ContactDomainView::getFormToMail() );

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
        final protected function getMailOrCreateModel( $wrapper, $mail_content ): ?PersonEmailModel
        {
            if(!( $wrapper instanceof MySQLConnectorWrapper) )
            {
                throw new Exception('wrapper is only allowed to be of the instance MySQLConnectorWrapper');
            }

            if( !is_string( $mail_content ) )
            {
                throw new Exception('getMailOrCreateModel - $mail_content is not a string');
            }

            $factory = new PersonEmailFactory( $wrapper );

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


        final public function validateSecurity(): bool
        {
            $retVal = false;

            try
            {
                ContactDomainView::validateSecuritySpoof();
                ContactDomainView::validateSecurityFSS();
                ContactDomainView::validateSecurityCaptcha();

                $retVal = true;
            }
            catch ( Exception $ex )
            {
                echo $ex;
            }

            return boolval( $retVal );
        }

    }

?>