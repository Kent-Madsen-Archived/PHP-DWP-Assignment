<?php
    /**
     *  Title: RegisterForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class RegisterForm
     */
    abstract class RegisterForm
    {
        /**
         * @return bool
         */
        public final static function validateIsSubmitted(): bool
        {
            $retVal = false;

            if( isset( $_POST[ 'form_register_submit' ] ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostUsername(): string
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

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedValue;
        }

        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostCity(): string
        {
            if( !isset( $_POST[ 'form_register_city' ] ) )
            {
                throw new Exception('field is not set');
            }

            $value =  trim( $_POST[ 'form_register_city' ] );

            if( is_null( $value ) || empty( $value ) )
            {
                throw new Exception('');
            }

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedValue;
        }



        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostPassword(): string
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

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedValue;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostPersonMail(): string
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

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_EMAIL, FILTER_NULL_ON_FAILURE );

            if( !filter_var( $sanitizedValue, FILTER_VALIDATE_EMAIL ) )
            {
                throw new Exception('email is not valid');
            }

            return $sanitizedValue;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostFirstname(): string
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
            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedValue;
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final static function getPostLastname(): ?string
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

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedValue;
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final static function getPostMiddlename(): ?string
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

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedValue;
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final static function getPostStreetAddressFloor(): ?string
        {
            if( !isset( $_POST[ 'form_register_street_floor' ] ) )
            {
                return '';
            }

            $value = trim( $_POST[ 'form_register_street_floor' ] );

            if( is_null( $value ) || empty( $value ) )
            {
                return '';
            }

            $sanitizedValue = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedValue;
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final static function getPostPhone(): ?string
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

            $sanitizedPhone = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedPhone;
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final static function getPostBirthday(): ?string
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

            $sanitizedBirthday = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedBirthday;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostStreetname(): string
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

            $sanitizedBirthday = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedBirthday;
        }


        /**
         * @return int
         * @throws Exception
         */
        public final static function getPostStreetAddressNumber(): int
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

            $sanitizedStreetAddressNumber = filter_var( $value, FILTER_SANITIZE_NUMBER_INT, FILTER_NULL_ON_FAILURE );
            $validated = filter_var( $sanitizedStreetAddressNumber, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

            if( $validated === false || is_null( $validated ) )
            {
                throw new Exception('' );
            }

            return $validated;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostZipCode(): string
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

            $sanitizedZipCode = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );
            return $sanitizedZipCode;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final static function getPostCountry(): string
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

            $sanitizedCountry = filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE );

            return $sanitizedCountry;
        }



    }
?>