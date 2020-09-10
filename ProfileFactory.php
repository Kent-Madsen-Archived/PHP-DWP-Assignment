<?php 
require './model/profile.php';

const database_server_name = "localhost";
const database_username_name = "root";
const database_password_name = "";
const database_database_name = "dwp_assignment";

class ProfileFactory
{
    public function __construct() 
    {
    
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

        $sql = "SELECT * From profile where username='" . $username . "';";

        $found_username;
        $found_password;
        $found_type;
        $found_identity;

        $result_query = $connection->query($sql);

        if ($result_query->num_rows > 0) {
            while($row = $result_query->fetch_assoc()) 
            {
                $found_identity = $row['identity'];
                $found_username = $row['username'];
                $found_password = $row['password'];
                $found_type = $row['profile_type_identity'];
            }

            $prof = new Profile($found_identity, $found_username, $found_password, $found_type);
            $retObject = $prof;
        }
        else 
        {
            // None
        }



        // luk forbindelsen
        $connection->close();
        
        return $retObject;
    }
}

?>