<?php 

const database_server_name = "localhost";
const database_username_name = "root";
const database_password_name = "";
const database_database_name = "dwp_assignment";

function log_into_profile( $username, $password )
{    
    // Variabler
    $username_found = "";
    $password_found = "";

    $sql = NULL;
    $result = NULL;

    $connection = new mysqli( database_server_name, 
                              database_username_name, 
                              database_password_name, 
                              database_database_name );

    // Muligt at få forbindelse?
    if( $connection -> connect_error )
    {
        die( "connection failed: " . $connection->connect_error );
    }

    // 
    $sql = "select * from profile where username='" . $username . "'";
    $result = $connection->query($sql);

    //
    if( $result->num_rows > 0 )
    {
        while( $row = $result->fetch_assoc() ) 
        {
            $username_found = $row['username'];
     
            $password_found = $row['password'];
        }
    }

    // do something
    if( ($password_found == hash('sha512', $password)) )
    {
        return true;
    }


    // luk forbindelsen
    $connection->close();

    return false;
}


// header("Location: ../index.php");
?>