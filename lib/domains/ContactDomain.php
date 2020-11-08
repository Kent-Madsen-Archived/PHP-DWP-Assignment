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

        /**
         * 
         */
        public function send( $model )
        {
            //
            $connection = new MySQLConnector( $this->getMysqlInformation() );

            // Factories prepared
            $contact_factory = new ContactFactory( $connection );

            if( $model->getFactory() == null )
            {
                $model->setFactory( $contact_factory );
            }

            $model = $this->convert_mail_to_id( $model, $connection );

            // Upload model
            $contact_factory->create( $model );
        }

        /**
         * 
         */
        protected function convert_mail_to_id( $model, $connection )
        {
            $person_email_factory = new PersonEmailFactory( $connection );
            $from_mail = $person_email_factory->get_by_name( $model->getFromMail() )[0];

            if( $from_mail == null )
            {
                $person_email_factory->create( $from_mail );
            }
            else 
            {
                $model->setFromMail( $from_mail->getIdentity() );
            }

            $to_mail = $person_email_factory->get_by_name( $model->getToMail() )[0];

            if( $to_mail == null )
            {
                $person_email_factory->create( $to_mail );
            }
            else 
            {
                $model->setToMail( $to_mail->getIdentity() );
            }
            
            return $model;
        }

    }

?>