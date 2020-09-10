<?php 
require_once 'Profile.php';

const database_server_name = "localhost";
const database_username_name = "root";
const database_password_name = "";
const database_database_name = "dwp_assignment";

class ProfileFactory
{
    public function __construct(){
        print('hey');
    }

    public function findProfileByUsername( $username )
    {
        // Profile class
        $retObject = NULL;

        $connection = new mysqli( database_server_name, 
                              database_username_name, 
                              database_password_name, 
                              database_database_name );

        // Muligt at få forbindelse?
        if( $connection -> connect_error )
        {
            die( "connection failed: " . $connection->connect_error );
        }




        // luk forbindelsen
        $connection->close();
        
        return $retObject;
    }

}



?>