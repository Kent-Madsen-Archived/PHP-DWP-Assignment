<?php 

$servername ="localhost";
$username = "root";
$password = "";
$database = "dwp_assignment";

//
$connection = new mysqli( $servername, 
                          $username, $password, 
                          $database );

if( $connection->connect_error ) 
{
    die('Error occured');
}

$select_profile = "SELECT * from profiles_table_view;";

$result = mysqli_query( $connection , $select_profile );

if ( ($result->num_rows) > 0 )
{
    while( $row = $result->fetch_assoc() ) {
        
      }
}

// Done
$connection->close();

// header("Location: ../index.php");
?>