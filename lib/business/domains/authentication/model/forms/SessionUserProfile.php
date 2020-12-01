<?php

    abstract class SessionUserProfile
    {
        public const session_key_user_profile_identity = 'user_profile_session_identity';
        public const session_key_user_profile_username = 'user_profile_session_username';

        public const session_key_user_profile_type = 'user_profile_session_profile_type';

        /**
         * @return int|null
         */
        public final static function getSessionUserProfileIdentity(): ?int
        {
            return $_SESSION[ SessionUserProfile::session_key_user_profile_identity ];
        }

        /**
         * @return bool
         */
        public final static function existSessionUserProfileIdentity():bool
        {
            return isset( $_SESSION[ SessionUserProfile::session_key_user_profile_identity ] );
        }


        /**
         * @return string|null
         */
        public final static function getSessionUserProfileUsername(): ?string
        {
            return $_SESSION[ SessionUserProfile::session_key_user_profile_username ];
        }

        /**
         * @return mixed
         */
        public final static function existSessionUserProfileUsername():bool
        {
            return isset( $_SESSION[ SessionUserProfile::session_key_user_profile_username ] );
        }


        /**
         * @return int|null
         */
        public final static function getSessionUserProfileType(): ?int
        {
            return $_SESSION[ SessionUserProfile::session_key_user_profile_type ];
        }

        /**
         * @return mixed
         */
        public final static function existSessionUserProfileType():bool
        {
            return isset( $_SESSION[ SessionUserProfile::session_key_user_profile_type ] );
        }

    }

?>