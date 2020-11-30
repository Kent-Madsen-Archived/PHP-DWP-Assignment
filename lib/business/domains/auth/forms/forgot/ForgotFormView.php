<?php
    /**
     *  Title: ForgotFormView
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ForgotFormView
     */
    class ForgotFormView
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