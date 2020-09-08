<?php 
const database_server_name = "localhost";
const database_username_name = "root";
const database_password_name = "";
const database_database_name = "dwp_assignment";

function update_profile_password_by_username( $username, $topassword )
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

    $sql = "UPDATE Profile SET password='" . hash('sha512', $topassword)  . "' WHERE username='$username'";

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

function update_profile_password_by_identity( $identity, $topassword )
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

function delete_profile_by_identity( $identity )
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

    $sql = "delete from profile where identity=" . $identity;

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


?>