<?php

    abstract class PostFormSpoofSecurityForm
    {
        /**
         * @return string|null
         */
        public final static function getPostFSSToken(): ?string
        {
            if( !self::existPostFSSToken() )
            {
                return null;
            }

            if( is_null( $_POST[ 'security_token' ] ) )
            {
                return null;
            }

            return strval( $_POST[ 'security_token' ] );
        }


        /**
         * @return bool
         */
        public final static function existPostFSSToken(): bool
        {
            return boolval( isset( $_POST[ 'security_token' ] ) );
        }

    }

?>