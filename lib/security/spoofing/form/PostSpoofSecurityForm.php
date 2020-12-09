<?php

    abstract class PostSpoofSecurityForm
    {

        /**
         * @return string|null
         */
        public static function getPostSecurityEmpty(): ?string
        {
            if( !self::existPostSecurityEmpty() )
            {
                return null;
            }

            if( is_null( $_POST[ 'security_empty' ] ) )
            {
                return null;
            }

            return strval( $_POST[ 'security_empty' ] );
        }


        /**
         * @return bool
         */
        public static function existPostSecurityEmpty(): bool
        {
            $retVal = false;

            if( isset( $_POST[ 'security_empty' ] ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }

    }

?>