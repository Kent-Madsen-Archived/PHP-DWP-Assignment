<?php 
const database_server_name = "localhost";
const database_username_name = "root";
const database_password_name = "";
const database_database_name = "dwp_assignment";


// ---------------------------------------------------------------------------------------------------------
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

// ----

const kunde   = 1;
const ejer    = 2;
const intern  = 3;
const pending = 4;

function create_profile( $username, $password, $profile_type_identity )
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

// --------------------------------------------------------------------------------------------
function create_articles()
{
    
}

function delete_articles()
{

}

function update_articles()
{

}

function read_articles()
{

}

// ------------------------------------------------------------------------------------------
function read_mails()
{

}

function delete_mails()
{

}

function update_mails()
{

}

function create_mails()
{

}

// -------------------------------------------------------------------------------
function read_products()
{

}

function delete_products()
{

}

function update_products()
{

}

function create_products()
{

}

/*
                    const database_server_name = "localhost";
                    const database_username_name = "root";
                    const database_password_name = "";
                    const database_database_name = "dwp_assignment";

                    $connection = new mysqli( database_server_name, 
                                              database_username_name, 
                                              database_password_name, 
                                              database_database_name );
                
                    // Muligt at få forbindelse?
                    if( $connection -> connect_error )
                    {
                        die( "connection failed: " . $connection->connect_error );
                    }

                    $sql = "select * from products";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo $row['title'] . '</br>' . $row['description'] . "</br>";
                        }
                      } else {
                        echo "0 results";
                      }
                
                
                    // luk forbindelsen
                    $connection->close();
                */



?>