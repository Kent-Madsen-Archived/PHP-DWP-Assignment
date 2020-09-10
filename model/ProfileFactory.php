<?php 
require 'profile.php';

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

        if ( $result_query->num_rows > 0 ) 
        {
            while( $row = $result_query->fetch_assoc() ) 
            {
                $found_identity = $row['identity'];
                $found_username = $row['username'];
                $found_password = $row['password'];
                $found_type = $row['profile_type_identity'];
            }

            $prof = new Profile( $found_identity, 
                                 $found_username, 
                                 $found_password, 
                                 $found_type );
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

    public function createProfile( $username, $password, $profile_type_identity )
    {
        $connection = new mysqli( database_server_name, 
                                  database_username_name, 
                                  database_password_name, 
                                  database_database_name );

        if( $connection->connect_error )
        {
            die("connection failed: " . $connection->connect_error);
        }

        // Overvej at gøre brug af salts
        $hashed = hash( "sha512", $password );

        $stmt = $connection->prepare("insert into profile(username, password, profile_type_identity) values(?, ?, ?)");
        $stmt->bind_param("ssi", $stmt_username, $stmt_password, $stmt_profile_type_identity);

        $stmt_username = $username;
        $stmt_password = $hashed;
        $stmt_profile_type_identity = $profile_type_identity;

        $stmt->execute();
        $stmt->close();

        $connection->close();
    }

    public function deleteProfile( $identity )
    {
        $retVal = false;

        $connection = new mysqli( database_server_name, 
                                  database_username_name, 
                                  database_password_name, 
                                  database_database_name );

        // Muligt at få forbindelse?
        if( $connection -> connect_error )
        {
            die( "connection failed: " . $connection->connect_error );
        }

        $sql = "delete from profile where identity=" . $identity;

        if( $connection->query($sql) === TRUE )
        {
            $retVal = true;
        }
        else 
        {
            $retVal = false;
        }

        // luk forbindelsen
        $connection->close();
        return $retVal;
    }

    public function updateProfilePassword( $identity, $topassword )
    {
        $connection = new mysqli( database_server_name, 
                                  database_username_name, 
                                  database_password_name, 
                                  database_database_name );

        // Muligt at få forbindelse?
        if( $connection -> connect_error )
        {
        die( "connection failed: " . $connection->connect_error );
        }

        $sql = "UPDATE Profile SET password='" . hash('sha512', $topassword)  . "' WHERE identity=$identity";

        if($connection->query($sql) === TRUE)
        {
        echo "successfull";
        }
        else 
        {
        echo "error";
        }

        // luk forbindelsen
        $connection->close();
    }

    public function existProfile( $username )
    {
        $retVal = false;

        $connection = new mysqli( database_server_name, 
                                  database_username_name, 
                                  database_password_name, 
                                  database_database_name );

        if( $connection->connect_error )
        {
            die("connection failed: " . $connection->connect_error);
        }

        $sql = "SELECT * From profile where username='" . $username . "';";

        $result_query = $connection->query( $sql );

        if ( $result_query->num_rows > 0 ) 
        {
            while( $row = $result_query->fetch_assoc() ) 
            {
                $foundUsername = $row['username'];

                if( $username == $foundUsername )
                {
                    $retVal = true;
                }
            }
        }
        else 
        {
            // None
        }

        $connection->close();
        return $retVal;
    }
}

?>