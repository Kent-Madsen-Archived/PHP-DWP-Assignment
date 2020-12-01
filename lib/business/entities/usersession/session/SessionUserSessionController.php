<?php
    SessionUserSessionController::requirements();

    /**
     * Class SessionUserSessionController
     */
    class SessionUserSessionController
    {
        /**
         *
         */
        private const class_name_view = 'SessionUserSessionView';
        private const class_name_variables = "SessionUserSessionVariables";


        /**
         * @throws Exception
         */
        public static final function requirements()
        {
            $cn_v = self::class_name_view;

            if( !class_exists( $cn_v ) )
            {
                self::throwCantFindClassError( $cn_v );
            }

            $cn_var = self::class_name_variables;
            if( !class_exists( $cn_var ) )
            {
                self::throwCantFindClassError( $cn_var );
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
         * @param int|null $value
         * @return int|null
         */
        public static final function setIdentityKey( ?int $value ): ?int
        {
            $_SESSION[ SessionUserSessionVariables::SESSION_IDENTITY_KEY ] = $value;
            return SessionUserSessionView::getIdentityKey();
        }


        /**
         * @param string|null $value
         * @return string|null
         */
        public static final function setUsernameKey( ?string $value ): ?string
        {
            $_SESSION[ SessionUserSessionVariables::SESSION_USERNAME_KEY ] = $value;
            return SessionUserSessionView::getUsernameKey();
        }


        /**
         * @param int|null $value
         * @return int|null
         */
        public static final function setProfileTypeKey( ?int $value ): ?int
        {
            $_SESSION[ SessionUserSessionVariables::SESSION_PROFILE_TYPE_KEY ] = $value;
            return SessionUserSessionView::getProfileTypeKey();
        }
    }

?>