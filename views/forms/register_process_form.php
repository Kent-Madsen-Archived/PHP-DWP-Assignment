<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    //
    if( isset( $_POST[ 'form_register_submit' ] ) )
    {
        $auth = new Auth();

        $username = $_POST[ 'form_register_username' ];
        $password = $_POST[ 'form_register_password' ];

        $person_name = new PersonNameModel( null );
        $person_name->setFirstName( $_POST[ 'form_register_firstname' ] );
        $person_name->setLastName( $_POST[ 'form_register_lastname' ] );
        $person_name->setMiddleName( $_POST[ 'form_register_middlename'] );

        $person_email = new PersonEmailModel( null );
        $person_email->setContent( $_POST[ 'form_register_email' ] );

        $person_birthday = '1994-11-08';

        $person_phone_number = $_POST[ 'form_register_phone_number' ];


        $person_address = new PersonAddressModel( null );
        
        $person_address->setStreetName( $_POST[ 'form_register_street_name' ] );
        $person_address->setStreetAddressNumber( $_POST[ 'form_register_street_address_number' ] );
        $person_address->setZipCode( $_POST[ 'form_register_street_zip_code' ] );
        $person_address->setCountry( $_POST[ 'form_register_country' ] );

        //
        $auth->register( $username, 
                         $password, 
                         $person_name, 
                         $person_email, 
                         $person_birthday, 
                         $person_phone_number, 
                         $person_address );

    }
?>