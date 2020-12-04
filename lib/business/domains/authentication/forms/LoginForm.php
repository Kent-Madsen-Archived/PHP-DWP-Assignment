<?php
    /**
     *  Title: LoginForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class LoginForm
     */
    abstract class LoginForm
    {
        public final static function validateIsSubmitted(): bool
        {
            $retval = false;

            if( isset( $_POST[ 'form_login_submit' ] ) )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostUsername(): string
        {
            if( !isset( $_POST[ 'form_login_username' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value =  trim( $_POST[ 'form_login_username' ] );

            if( is_null( $value ) || empty( $value ) )
            {
                throw new Exception('');
            }

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING );
            return $sanitizedValue;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostPassword(): string
        {
            if( !isset( $_POST[ 'form_login_password' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_login_password' ] );

            if( is_null( $value ) || empty( $value ))
            {
                throw new Exception('');
            }

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING );
            return $sanitizedValue;
        }

    }

?>