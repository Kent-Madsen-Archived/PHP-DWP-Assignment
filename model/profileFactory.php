<?php 
require_once 'objects/profile.php';

class ProfileFactory
{
    public function create( $username, $email, $password, $access_type )
    {
        $connection = new mysqli( databaseServerHostname, 
                                  databaseServerUser, 
                                  databaseServerPass, 
                                  databaseServerDatabase );
        
        if ($connection->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $connection->prepare("INSERT INTO profile (username, email, password, access_type_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $stmt_username, $stmt_email, $stmt_password, $stmt_access_type_id);

        $stmt_username = trim($username);
        $stmt_email = $email;
        
        //
        $stmt_password = password_hash( $password, PASSWORD_BCRYPT, ['cost'=>15] );
        //

        $stmt_access_type_id = $access_type;

        $stmt->execute();

        $stmt->close();

        // $profile = new Profile;
        
        
        $connection->close();
    }

    public function read( $username, $password )
    {
        $retVal = null;

        $connection = new mysqli( databaseServerHostname, 
                                  databaseServerUser, 
                                  databaseServerPass, 
                                  databaseServerDatabase );
        
        if ($connection->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * from profile where username='" . $username . "';";
        $result = $connection->query($sql);

        if( $result->num_rows > 0 )
        {
            while( $row = $result->fetch_assoc() )
            {
                $profile = new profile( $row['identity'], 
                                        $row['username'], 
                                        $row['email'], 
                                        $row['password'], 
                                        $row['access_type_id']);

                if( password_verify( $password, $profile->getPassword() ) )
                {
                    $retVal = $profile;
                }
            }
        }

        $connection->close();

        return $retVal;
    }

    public function delete( $id )
    {

    }

    public function update_email( $id, $email )
    {

    }

    public function update_password( $id, $password )
    {

    }

    public function update_access_type( $id, $access_type )
    {

    }
}

?>