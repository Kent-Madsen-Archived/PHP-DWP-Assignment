<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    //
    if( isset( $_POST[ 'form_register_submit' ] ) )
    {
        if( isset( $_SESSION[ 'fss_token' ] ) )
        {   
            // Compare strings
            if( !( $_SESSION[ 'fss_token' ] == $_POST[ 'security_token' ] ) )
            {
                throw new Exception( 'Security Error: FSS Token does not match with its form' );
            }
        }

        $recaptcha_v2 = new ReCaptchaV2( GOOGLE_V2_RECAPTCHA_PRIVATE, GOOGLE_V2_RECAPTCHA_PUBLIC );
        $recaptcha_v2->setResponseKey( $_POST['g-recaptcha-response'] );
        
        $recaptcha_v2->retrieve_response();
        $recaptcha_v2->validate();


        $auth = new Auth();

        $profile = new ProfileModel( null );
        $profile->setUsername( $_POST[ 'form_register_username' ] );
        $profile->setPassword( $_POST[ 'form_register_password' ] );

        //
        $person_name = new PersonNameModel( null );
        $person_name->setFirstName( $_POST[ 'form_register_firstname' ] );
        $person_name->setLastName( $_POST[ 'form_register_lastname' ] );
        $person_name->setMiddleName( $_POST[ 'form_register_middlename'] );

        //
        $person_email = new PersonEmailModel( null );
        $person_email->setContent( $_POST[ 'form_register_email' ] );

        //
        $person_birthday = $_POST[ 'form_register_birthday' ];

        //
        $person_phone_number = $_POST[ 'form_register_phone_number' ];

        //
        $person_address = new PersonAddressModel( null );
        
        $person_address->setStreetName( $_POST[ 'form_register_street_name' ] );
        $person_address->setStreetAddressNumber( $_POST[ 'form_register_street_address_number' ] );
        $person_address->setZipCode( $_POST[ 'form_register_street_zip_code' ] );
        $person_address->setCountry( $_POST[ 'form_register_country' ] );

        //
        $auth->register( $profile, 
                         $person_name, 
                         $person_email, 
                         $person_birthday, 
                         $person_phone_number, 
                         $person_address );

    }
?>