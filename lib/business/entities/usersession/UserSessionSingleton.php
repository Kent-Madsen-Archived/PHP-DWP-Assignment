<?php
    UserSessionSingleton::requirements();

    /**
     * Class UserSessionSingleton
     */
    class UserSessionSingleton
    {
        private const class_name_errors = "UserSessionErrors";
        private const class_name_variables = "SessionUserSessionVariables";
        private const class_name_sessionController = "SessionUserSessionController";
        private const class_name_sessionView = "SessionUserSessionView";

        private const class_name_userSession = "UserSession";


        /**
         * @throws Exception
         */
        public static final function requirements()
        {
            $cn_v = self::class_name_variables;
            if( !class_exists( $cn_v ) )
            {
                self::throwCantFindClassError( $cn_v );
            }

            $cn_sc = self::class_name_sessionController;
            if( !class_exists( $cn_sc ) )
            {
                self::throwCantFindClassError( $cn_sc );
            }

            $cn_sv = self::class_name_sessionView;
            if( !class_exists($cn_sv ) )
            {
                self::throwCantFindClassError( $cn_sv );
            }

            $cn_use = self::class_name_errors;
            if( !class_exists( $cn_use ) )
            {
                self::throwCantFindClassError( $cn_use );
            }

            $cn_us = self::class_name_userSession;
            if( !class_exists( $cn_us  ) )
            {
                self::throwCantFindClassError( $cn_us );
            }
        }


        /**
         * @param $value
         * @throws Exception
         */
        private final static function throwCantFindClassError( $value )
        {
            $message = "Can't find the class {$value}";
            throw new Exception( $message );
        }


        /**
         * @return UserSession
         * @throws Exception
         */
        public static final function getInstance(): UserSession
        {
            if(! SessionUserSessionView::isSessionValuesExisting() )
            {
                throw new Exception('No Data');
            }

            $identity = SessionUserSessionView::getIdentityKey();
            $username = SessionUserSessionView::getUsernameKey();
            $profile_type_id = SessionUserSessionView::getProfileTypeKey();

            $array = array( 'person_entity_identity'    => $identity,
                            'person_entity_username'    => $username,
                            'person_entity_profile_type' => $profile_type_id );

            $session = new UserSession( $array );
            return $session;
        }


        /**
         * @param UserSession $session
         */
        public static final function setInstance( UserSession $session ): void
        {
            SessionUserSessionController::setIdentityKey( $session->getIdentity() );
            SessionUserSessionController::setUsernameKey( $session->getUsername() );
            SessionUserSessionController::setProfileTypeKey( $session->getProfileType() );
        }


        /**
         * @return bool
         */
        public static final function isCreated(): bool
        {
            $retVal = ( self::isSessionValuesExisting() && self::isSessionValuesCorrectType() );
            return boolval( $retVal );
        }

    }

?>