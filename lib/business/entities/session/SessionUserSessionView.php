<?php
    SessionUserSessionView::requirements();

    /**
     * Class SessionUserSessionView
     */
    class SessionUserSessionView
    {
        private const class_name_controller = "SessionUserSessionController";
        private const class_name_variables = "SessionUserSessionVariables";


        /**
         * @throws Exception
         */
        public static final function requirements()
        {
            $cn_c = self::class_name_controller;

            if( !class_exists( $cn_c ) )
            {
                self::throwCantFindClassError( $cn_c );
            }

            $cn_v = self::class_name_variables;
            if( !class_exists( $cn_v ) )
            {
                self::throwCantFindClassError( $cn_v );
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
         * @return int
         */
        public static final function getIdentityKey(): ?int
        {
            return $_SESSION[ SessionUserSessionVariables::SESSION_IDENTITY_KEY ];
        }


        /**
         * @return string|null
         */
        public static final function getUsernameKey( ): ?string
        {
            return $_SESSION[ SessionUserSessionVariables::SESSION_USERNAME_KEY ];
        }


        /**
         * @return int|null
         */
        public static final function getProfileTypeKey(): ?int
        {
            return $_SESSION[ SessionUserSessionVariables::SESSION_PROFILE_TYPE_KEY ];
        }


        /**
         * @return bool
         */
        public static final function ExistIdentityKey(): bool
        {
            return isset( $_SESSION[ SessionUserSessionVariables::SESSION_IDENTITY_KEY ] );
        }


        /**
         * @return bool
         */
        public static final function ExistUsernameKey(): bool
        {
            return isset( $_SESSION[ SessionUserSessionVariables::SESSION_USERNAME_KEY ] );
        }


        /**
         * @return bool
         */
        public static final function ExistProfileTypeKey(): bool
        {
            return isset( $_SESSION[ SessionUserSessionVariables::SESSION_PROFILE_TYPE_KEY ] );
        }


        /**
         * @return bool
         */
        public static final function isIdentityKeyAInt(): bool
        {
            if( !self::ExistIdentityKey() )
            {
                return false;
            }

            return is_int( $_SESSION[ SessionUserSessionVariables::SESSION_IDENTITY_KEY ] );
        }


        /**
         * @return bool
         */
        public static final function isUsernameKeyAString(): bool
        {
            if( !self::ExistUsernameKey() )
            {
                return false;
            }

            return is_string( $_SESSION[ SessionUserSessionVariables::SESSION_USERNAME_KEY ] );
        }


        /**
         * @return bool
         */
        public static final function isProfileTypeKeyAInt():bool
        {
            if( !self::ExistProfileTypeKey() )
            {
                return false;
            }

            return is_int( $_SESSION[ SessionUserSessionVariables::SESSION_PROFILE_TYPE_KEY ] );
        }


        /**
         * @return bool
         */
        public static final function isSessionValuesExisting(): bool
        {
            $identity_exist = false;
            $username_exist = false;
            $profile_type_exist = false;

            if( SessionUserSessionView::ExistIdentityKey() )
            {
                $identity_exist = true;
            }

            if( SessionUserSessionView::ExistUsernameKey() )
            {
                $username_exist = true;
            }

            if( SessionUserSessionView::ExistProfileTypeKey() )
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

            if( SessionUserSessionView::isIdentityKeyAInt() )
            {
                $identity_secure = true;
            }

            if( SessionUserSessionView::isUsernameKeyAString() )
            {
                $username_secure = true;
            }

            if( SessionUserSessionView::isProfileTypeKeyAInt() )
            {
                $profile_type_secure = true;
            }

            $retVal = ( $identity_secure && $username_secure && $profile_type_secure );

            return boolval( $retVal );
        }

    }

?>