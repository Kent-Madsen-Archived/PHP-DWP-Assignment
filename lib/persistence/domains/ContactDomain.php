<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class ContactDomain
    {
        // Construct
        public function __construct()
        {
            $access = new NetworkAccess( 'localhost', 3600 );   
            $user_credential = new UserCredential( 'development', 'Epc63gez' );
            $database = "dwp_assignment";

            $this->setMysqlInformation( new MySQLInformation( $access, $user_credential, $database ) );
        }

        // Variables
        private $mysql_info = null;

        /**
         * 
         */
        public function send()
        {
            //
            $connection = new MySQLConnector( $this->getMysqlInformation() );

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
         * 
         */
        protected function getFromMail( $connection )
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
         * 
         */
        protected function getToMail( $connection )
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
         * 
         */
        protected function getSubject()
        {
            return $_POST[ 'form_contact_subject' ];
        }

        /**
         * 
         */
        protected function getMessage()
        {
            return $_POST[ 'form_contact_message' ];
        }

        // accessors
        /**
         * 
         */
        public function getMysqlInformation()
        {
            return $this->mysql_info;
        }

        /**
         * 
         */
        public function setMysqlInformation( $var )
        {
            $this->mysql_info = $var;
        }
    }

?>