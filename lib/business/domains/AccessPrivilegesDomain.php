<?php
    /**
     *  Title: AccessPrivilegesDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
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
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
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