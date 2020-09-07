<?php 

const database_server_name = "localhost";
const database_username_name = "root";
const database_password_name = "";
const database_database_name = "dwp_assignment";

function log_into_profile()
{
    $connection = new mysqli(database_server_name, database_username_name, database_password_name, database_database_name);

    if($connection->connect_error)
    {
        die("connection failed: " . $connection->connect_error);
    }

    $connection->close();
}

// header("Location: ../index.php");
?>