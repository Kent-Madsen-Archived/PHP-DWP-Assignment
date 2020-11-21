<?php
    /**
     *  Title: AboutDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
    */

    /**
     * Class AboutDomain
     */
    class AboutDomain 
        extends Domain
    {
        /**
         * AboutDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );   
            $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );

            $database = WEBPAGE_DATABASE_NAME;

            $this->setInformation( new MySQLInformation( $access, $user_credential, $database ) );    
        }

    }

?>