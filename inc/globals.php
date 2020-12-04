<?php
    /**
     *  Title: Global Variables
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Page
     *  Project: DWP-Assignment
     */
    // -----------------------------------------------------------------------------------------
    define( "WEBPAGE_DEFAULT_PAGE_TITLE", "PHP DWP Assignment" );
    define( "WEBPAGE_DEFAULT_MAILTO", "kent.vejrup.madsen@protonmail.com" );


    // -----------------------------------------------------------------------------------------
    define( "GOOGLE_V2_RECAPTCHA_PUBLIC", "6LeQZ-EZAAAAAAH_ldyVJXwQiD-5_6KjnXFycawQ" );
    define( "GOOGLE_V2_RECAPTCHA_PRIVATE", "6LeQZ-EZAAAAAIDa8LyfDwh0belj2jbM6Uxy6W_I" );

    define( "WEBPAGE_DEFAULT_SALT", "xQpd78qqjrMe4oIpyRc9BTmGlTAsPgyyNtihoDbaT1ak68Hrs7jXeDETB12PhLZZ2zXF6vq4d8UckBNUhSUILOUr1rIMEPCmuGEF" );


    // -----------------------------------------------------------------------------------------
    define('S_REQUEST', 'REQUEST_URI');
    define('S_HOST', 'HTTP_HOST');


    // -----------------------------------------------------------------------------------------
    define( "BASE_10", 10 );

    define( 'CONSTANT_ZERO', 0 );
    define( 'CONSTANT_ONE', 1 );
    define( 'CONSTANT_TWO', 2 );
    define( 'CONSTANT_THREE', 3 );
    define( 'CONSTANT_FOUR', 4 );
    define( 'CONSTANT_FIVE', 5 );


    if( !( (include 'database.php') == TRUE ) )
    {
        throw new Exception('couldn\'t find the database.php file' );
    }

    mb_internal_encoding("UTF-8");
?>