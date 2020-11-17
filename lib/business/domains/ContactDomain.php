<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
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
         * @throws Exception
         */
        final public function send()
        {
            //
            $connection = new MySQLConnectorWrapper( $this->getInformation() );

            // Factories prepared
            $contact_factory = new ContactFactory( $connection );

            $contact_model = new ContactModel( $contact_factory );

            //
            $contact_model->setSubject( $this->getSubject() );
            $contact_model->setMessage( $this->getMessage() );

            $pe_fromMail = $this->getFromMail( $connection );
            $pe_toMail = $this->getToMail( $connection );

            $contact_model->setFromMail( $pe_fromMail->getIdentity() );
            $contact_model->setToMail( $pe_toMail->getIdentity() );

            $contact_model->setHasBeenSend( 0 );      

            // Upload model
            $contact_factory->create( $contact_model );
        }


        /**
         * @param $connection
         * @return mixed
         * @throws Exception
         */
        final protected function getFromMail( $connection )
        {
            $factory = new PersonEmailFactory( $connection );

            $fromMail = new PersonEmailModel( $factory );
            $fromMail->setContent( $_POST[ 'form_contact_from' ] );

            if( $factory->validate_if_mail_exist( $fromMail ) )
            {
                $fromMail = $factory->read_by_name( $fromMail );
            }
            else 
            {
                $fromMail = $factory->create( $fromMail );
            }

            return $fromMail;
        }


        /**
         * @param $connection
         * @return mixed
         * @throws Exception
         */
        final protected function getToMail( $connection )
        {
            $factory = new PersonEmailFactory( $connection );

            $toMail = new PersonEmailModel( $factory );
            $toMail->setContent( WEBPAGE_DEFAULT_MAILTO );

            if( $factory->validate_if_mail_exist( $toMail ) )
            {   
                $toMail = $factory->read_by_name( $toMail );
            }
            else 
            {
                $toMail = $factory->create( $toMail );
            }
            
            return $toMail;
        }


        /**
         * @return mixed
         */
        final protected function getSubject()
        {
            return $_POST[ 'form_contact_subject' ];
        }


        /**
         * @return mixed
         */
        final protected function getMessage()
        {
            return $_POST[ 'form_contact_message' ];
        }

    }

?>