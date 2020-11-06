<?php 
    //
    $access = new NetworkAccess( 'localhost', 3600 );
    $user_credential = new UserCredential( 'development', 'Epc63gez' );

    $database = "dwp_assignment";

    //
    $mysql_information = new MySQLInformation( $access, $user_credential, $database );

    //
    $connection = new MySQLConnector( $mysql_information );

    //
    $connection->connect();

    

    $connection->disconnect();
?>