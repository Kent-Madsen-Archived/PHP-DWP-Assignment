<?php 

$servername ="localhost";
$username = "root";
$password = "";
$database = "dwp_assignment";

/*
$connection = new mysqli( $servername, 
                          $username, $password, 
                          $database );

if( $connection->connect_error ) 
{
    die('Error occured');
}

$select_profile = "SELECT * from profiles_table_view;";

$result = mysqli_query( $connection , $select_profile );



// Done
$connection->close();
*/

const database_server_name = "localhost";
const database_username_name = "root";
const database_password_name = "";
const database_database_name = "dwp_assignment";


const kunde   = 1;
const ejer    = 2;
const intern  = 3;
const pending = 4;

function create_profile( $username, $password, $profile_type_identity )
{
    $connection = new mysqli(database_server_name, database_username_name, database_password_name, database_database_name);

    if($connection->connect_error)
    {
        die("connection failed: " . $connection->connect_error);
    }

    // Overvej at gøre brug af salts
    $hashed = hash("sha512", $password);

    $stmt = $connection->prepare("insert into profile(username, password, profile_type_identity) values(?, ?, ?)");
    $stmt->bind_param("ssi", $stmt_username, $stmt_password, $stmt_profile_type_identity);

    $stmt_username = $username;
    $stmt_password = $hashed;
    $stmt_profile_type_identity = $profile_type_identity;

    $stmt->execute();
    $stmt->close();

    $connection->close();
}

create_profile('test', 'test', 2);


// header("Location: ../index.php");
?>