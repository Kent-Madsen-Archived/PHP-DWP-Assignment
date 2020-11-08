<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    // Set's it so, that sessions can only be used by cookies and disallows it's ussage in the url.
    // It removes URL based attacks 
    ini_set( 'session.use_only_cookies', true );

    // Setup session if it's not called by default
    // in php.ini set session.auto_start to 1
    session_start();
?>

<?php 
    // Internal Libraries
    require_once 'bootstrap.php'; 
    require_once 'router.php'; 

    $access = new NetworkAccess( 'localhost', 3600 );
    $user_credential = new UserCredential( 'development', 'Epc63gez' );

    $database = "dwp_assignment";

    //
    $mysql_information = new MySQLInformation( $access, $user_credential, $database );

    //
    $connection = new MySQLConnector( $mysql_information );

    $person_email_factory = new PersonEmailFactory( $connection );
    $person_email_model = new PersonEmailModel($person_email_factory);
    $person_email_model->setContent('fracturer@outlook.com');
    
    $person_email_factory->create($person_email_model);


?>