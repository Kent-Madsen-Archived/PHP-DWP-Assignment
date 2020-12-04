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
         * AccessPrivilegesDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }


        /**
         *
         */
        public const class_name = "AccessPrivilegesDomain";


        /**
         * @return bool
         */
        public final function is_logged_in(): bool
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
        public final function is_not_logged_in(): bool
        {
            return !$this->is_logged_in();
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function isAdmin(): bool
        {
            $retVal = false;

            if( $this->is_not_logged_in() )
            {
                return $retVal;
            }

            $factory = $this->getProfileFactory();
            $model = $factory->createModel();

            $model->setIdentity( SessionUserProfile::getSessionUserProfileIdentity() );
            $factory->readModel($model );

            if( $factory->validateIfProfileTypeIsAdmin( $model ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        //
        /**
         * @return ProfileFactory|null
         * @throws Exception
         */
        public final function getProfileFactory(): ?ProfileFactory
        {
            return GroupAuthentication::getProfileFactory();
        }

    }

?>