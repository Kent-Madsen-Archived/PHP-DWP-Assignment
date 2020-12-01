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
            implements AccessPrivilegesInteraction
    {
        /**
         *
         */
        public const class_name = "AccessPrivilegesDomain";


        /**
         * AccessPrivilegesDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }

        /**
         * @return bool
         */
        public function is_logged_in()
        {
            if( SessionUserProfile::existSessionUserProfileIdentity() &&
                SessionUserProfile::existSessionUserProfileUsername() &&
                SessionUserProfile::existSessionUserProfileType() )
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

            if( SessionUserProfile::getSessionUserProfileType() == 4 )
            {
                return TRUE;
            }

            return FALSE;
        }
    }

?>