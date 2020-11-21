<?php
    /**
     *  Title: RegisterDomainFormView
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class RegisterDomainFormView
     */
    class RegisterDomainFormView
    {
        /**
         * RegisterDomainFormView constructor.
         */
        public function __construct()
        {

        }


        /**
         * @return bool
         */
        final public static function validateIsSubmitted(): bool
        {
            $retVal = false;

            if( isset( $_POST[ 'form_register_submit' ] ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return string
         * @throws Exception
         */
        final public static function getPostUsername(): string
        {
            if( !isset( $_POST[ 'form_register_username' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value =  trim( $_POST[ 'form_register_username' ] );

            if( is_null( $value ) || empty( $value ) )
            {
                throw new Exception('');
            }

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING );

            return strval( htmlentities( $sanitizedValue ) );
        }


        /**
         * @return string
         * @throws Exception
         */
        final public static function getPostPassword(): string
        {
            if( !isset( $_POST[ 'form_register_password' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_register_password' ] );

            if( is_null( $value ) || empty( $value ))
            {
                throw new Exception('');
            }

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING );
            return strval( htmlentities( $sanitizedValue ) );
        }


        /**
         * @return string
         * @throws Exception
         */
        final public static function getPostPersonMail(): string
        {
            if( !isset( $_POST[ 'form_register_email' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_register_email' ] );

            if( is_null( $value ) || ( empty( $value ) ) )
            {
                throw new Exception('Register email is empty');
            }

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_EMAIL );
            if( !filter_var( $sanitizedValue, FILTER_VALIDATE_EMAIL ) )
            {
                throw new Exception('email is not valid');
            }

            return strval( htmlentities( $sanitizedValue ) );
        }


        /**
         * @return string
         * @throws Exception
         */
        final public static function getPostFirstname(): string
        {
            // Makes sure the field is set
            if( !isset( $_POST[ 'form_register_firstname' ] ) )
            {
                throw new Exception('field is not set');
            }

            // get input
            $value = trim( $_POST[ 'form_register_firstname' ] );

            // Does the field have any content
            if( is_null( $value ) || empty( $value ))
            {
                throw new Exception('');
            }

            // Filter
            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING );
            return strval( htmlentities( $sanitizedValue ) );
        }


        /**
         * @return string|null
         * @throws Exception
         */
        final public static function getPostLastname(): ?string
        {
            if( !isset( $_POST[ 'form_register_lastname' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_register_lastname' ] );

            if( is_null( $value ) || empty( $value ) )
            {
                throw new Exception('');
            }

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING );
            return strval( htmlentities( $sanitizedValue ) );
        }


        /**
         * @return string|null
         * @throws Exception
         */
        final public static function getPostMiddlename(): ?string
        {
            if( !isset( $_POST[ 'form_register_middlename' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_register_middlename' ] );

            if( is_null( $value ) || empty( $value ) )
            {
                throw new Exception('');
            }

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING );
            return strval( htmlentities( $sanitizedValue ) );
        }


        /**
         * @return string|null
         * @throws Exception
         */
        final public static function getPostPhone(): ?string
        {
            if( !isset( $_POST[ 'form_register_phone_number' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_register_phone_number' ] );

            if( is_null( $value ) || empty( $value )  )
            {
                throw new Exception('' );
            }

            $sanitizedPhone = filter_var( $value, FILTER_SANITIZE_STRING );
            return strval( htmlentities( $sanitizedPhone ) );
        }


        /**
         * @return string|null
         * @throws Exception
         */
        final public static function getPostBirthday(): ?string
        {
            if( !isset( $_POST[ 'form_register_birthday' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_register_birthday' ] );

            if( is_null( $value ) || empty( $value )  )
            {
                throw new Exception('' );
            }

            $sanitizedBirthday = filter_var( $value, FILTER_SANITIZE_STRING );
            return strval( htmlentities( $sanitizedBirthday ) );
        }


        /**
         * @return string
         * @throws Exception
         */
        final public static function getPostStreetname(): string
        {
            if( !isset( $_POST[ 'form_register_street_name' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_register_street_name' ] );

            if( is_null( $value ) || empty( $value )  )
            {
                throw new Exception('');
            }

            $sanitizedBirthday = filter_var( $value, FILTER_SANITIZE_STRING );
            return strval( htmlentities( $sanitizedBirthday ) );
        }


        /**
         * @return int
         * @throws Exception
         */
        final public static function getPostStreetAddressNumber(): int
        {
            if( !isset( $_POST[ 'form_register_street_address_number' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = $_POST[ 'form_register_street_address_number' ];

            if( is_null( $value ) || empty( $value )  )
            {
                throw new Exception('');
            }

            $sanitizedStreetAddressNumber = filter_var( $value, FILTER_SANITIZE_NUMBER_INT );
            $validated = filter_var( $sanitizedStreetAddressNumber, FILTER_VALIDATE_INT );

            if( $validated === false || is_null( $validated ) )
            {
                throw new Exception('' );
            }

            return intval( $validated );
        }


        /**
         * @return string
         * @throws Exception
         */
        final public static function getPostZipCode(): string
        {
            if( !isset( $_POST[ 'form_register_street_zip_code' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_register_street_zip_code' ] );

            if( is_null( $value ) || empty( $value )  )
            {
                throw new Exception('');
            }

            $sanitizedZipCode = filter_var( $value, FILTER_SANITIZE_STRING );
            return strval( htmlentities( $sanitizedZipCode ) );
        }


        /**
         * @return string
         * @throws Exception
         */
        final public static function getPostCountry(): string
        {
            if( !isset( $_POST[ 'form_register_country' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value = trim( $_POST[ 'form_register_country' ] );

            if( is_null( $value ) || empty( $value )  )
            {
                throw new Exception('');
            }

            $sanitizedCountry = filter_var( $value, FILTER_SANITIZE_STRING );

            return strval( htmlentities( $sanitizedCountry ) );
        }



    }
?>