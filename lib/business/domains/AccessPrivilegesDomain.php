<?php  
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class AccessPrivilegesDomain
     */
    class AccessPrivilegesDomain
        extends Domain
    {
        /**
         * AccessPrivilegesDomain constructor.
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
         */
        public function is_logged_in()
        {
            if( isset( $_SESSION[ 'user_session_object_identity' ] ) )
            {
                return TRUE;
            }

            return FALSE;
        }

        /**
         * @return bool
         */
        public function is_not_logged_in()
        {
            return !$this->is_logged_in();
        }

        /**
         * @return bool
         */
        public function is_admin()
        {
            if( $this->is_logged_in() == FALSE )
            {
                return FALSE;
            }

            if( $_SESSION[ 'user_session_object_profile_type' ] == 3 )
            {
                return TRUE;
            }

            return FALSE;
        }
    }

?>