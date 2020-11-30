<?php
    /**
     *  Title: ForgotForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ForgotForm
     */
    abstract class ForgotForm
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