<?php
    /**
     *  Title: ForgotDomainView
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ForgotDomainView
     */
    class ForgotDomainView
    {
        /**
         * @return bool
         */
        public static final function validateIsSubmitted(): bool
        {
            $retVal = false;

            if( isset( $_POST[ 'submit_forgot_form' ] ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }

    }
?>