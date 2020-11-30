<?php

/**
 * Class UserSessionDataView
 */
    class UserSessionDataView
    {
        /**
         * @return UserSession
         * @throws Exception
         */
        public static final function getInstance(): UserSession
        {
            if(! self::isSessionValuesExisting() )
            {
                throw new Exception('No Data');
            }

            $identity = self::getIdentityKey();
            $username = self::getUsernameKey();
            $profile_type_id = self::getProfileTypeKey();

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
            self::setIdentityKey( $session->getIdentity() );
            self::setUsernameKey( $session->getUsername() );
            self::setProfileTypeKey( $session->getProfileType() );
        }


        /**
         * @return bool
         */
        public static final function isCreated(): bool
        {
            $retVal = ( self::isSessionValuesExisting() && self::isSessionValuesCorrectType() );
            return boolval( $retVal );
        }


        /**
         * @return bool
         */
        public static final function isSessionValuesExisting(): bool
        {
            $identity_exist = false;
            $username_exist = false;
            $profile_type_exist = false;

            if( self::ExistIdentityKey() )
            {
                $identity_exist = true;
            }

            if( self::ExistUsernameKey() )
            {
                $username_exist = true;
            }

            if( self::ExistProfileTypeKey() )
            {
                $profile_type_exist = true;
            }

            $retVal = ( $identity_exist && $username_exist && $profile_type_exist );

            return boolval( $retVal );
        }


        /**
         * @return bool
         */
        public static final function isSessionValuesCorrectType(): bool
        {
            $identity_secure = false;
            $username_secure = false;
            $profile_type_secure = false;

            if( self::isIdentityKeyAInt() )
            {
                $identity_secure = true;
            }

            if( self::isUsernameKeyAString() )
            {
                $username_secure = true;
            }

            if( self::isProfileTypeKeyAInt() )
            {
                $profile_type_secure = true;
            }

            $retVal = ( $identity_secure && $username_secure && $profile_type_secure );

            return boolval( $retVal );
        }


        /**
         * @return int
         */
        public static final function getIdentityKey(): ?int
        {
            return $_SESSION[ 'user_profile_session_identity' ];
        }


        /**
         * @return string|null
         */
        public static final function getUsernameKey( ): ?string
        {
            return $_SESSION[ 'user_profile_session_username' ];
        }


        /**
         * @return int|null
         */
        public static final function getProfileTypeKey(): ?int
        {
            return $_SESSION['user_profile_session_profile_type'];
        }


        //
        /**
         * @param int $value
         */
        public static final function setIdentityKey( int $value ): void
        {
            $_SESSION[ 'user_profile_session_identity' ] = $value;
        }


        /**
         * @param string $value
         */
        public static final function setUsernameKey( string $value ): void
        {
            $_SESSION[ 'user_profile_session_username' ] = $value;
        }


        /**
         * @param int $value
         */
        public static final function setProfileTypeKey( int $value ): void
        {
            $_SESSION['user_profile_session_profile_type'] = $value;
        }


        /**
         * @return bool
         */
        public static final function ExistIdentityKey()
        {
            return isset( $_SESSION[ 'user_profile_session_identity' ] );
        }


        /**
         * @return bool
         */
        public static final function ExistUsernameKey()
        {
            return isset( $_SESSION[ 'user_profile_session_username' ] );
        }


        /**
         * @return bool
         */
        public static final function ExistProfileTypeKey()
        {
            return isset( $_SESSION[ 'user_profile_session_profile_type' ] );
        }


        /**
         * @return bool
         */
        public static final function isIdentityKeyAInt()
        {
            return is_int( $_SESSION[ 'user_profile_session_identity' ] );
        }


        /**
         * @return bool
         */
        public static final function isUsernameKeyAString()
        {
            return is_string( $_SESSION[ 'user_profile_session_username' ] );
        }


        /**
         * @return bool
         */
        public static final function isProfileTypeKeyAInt()
        {
            return is_int( $_SESSION[ 'user_profile_session_profile_type' ] );
        }
    }

?>