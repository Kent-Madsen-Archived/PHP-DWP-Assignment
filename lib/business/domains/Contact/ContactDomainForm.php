<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ContactDomainForm
     */
    class ContactDomainForm
        extends Domain
    {
        // Construct
        /**
         * ContactDomainForm constructor.
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

            //
            $connection = new MySQLConnectorWrapper( $this->getInformation() );


            // Factories prepared
            $peFactory = new ContactFactory( $connection );
            $contact_model = $peFactory->createModel();

            $contact_model->setSubject( ContactDomainFormView::getFormSubject() );
            $contact_model->setMessage( ContactDomainFormView::getFormMessage() );

            $peModelFrom = $this->getMailOrCreateModel( $connection, ContactDomainFormView::getFormFromMail() );
            $peModelTo   = $this->getMailOrCreateModel( $connection, ContactDomainFormView::getFormToMail() );

            $contact_model->setFromMail( $peModelFrom->getIdentity() );
            $contact_model->setToMail( $peModelTo->getIdentity() );

            //
            $contact_model->setHasBeenSend( CONSTANT_ZERO );

            // Upload model
            if( $peFactory->create( $contact_model ) )
            {
                // Success
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @param $connection
         * @param $name
         * @return PersonEmailModel|null
         * @throws Exception
         */
        final protected function getMailOrCreateModel( $connection, $name ): ?PersonEmailModel
        {
            $factory = new PersonEmailFactory( $connection );

            $mailModel = new PersonEmailModel( $factory );
            $mailModel->setContent( $name );

            if( $factory->validate_if_mail_exist( $mailModel ) )
            {
                $mailModel = $factory->read_by_name( $mailModel );
            }
            else 
            {
                $mailModel = $factory->create( $mailModel );
            }

            return $mailModel;
        }

    }

?>