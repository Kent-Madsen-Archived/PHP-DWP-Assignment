<?php 
require_once '/objects/ProfileInformation.php';
require_once '/cfg/config.php';

class ProfileInformationFactory
{
    public function create( $profile_id, 
                            $person_name, 
                            $address, 
                            $post_zone, 
                            $country, 
                            $birthday )
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
        
        $stmt = $connection->prepare("INSERT INTO profile_information (profile_id, person_name, address, post_zone, country, birthday) VALUES (?, ?, ?, ?, ? , ?)");
        $stmt->bind_param( "isssss", 
                           $stmt_profile_id, 
                           $stmt_person_name, 
                           $stmt_address, 
                           $stmt_post_zone, 
                           $stmt_country, 
                           $stmt_birthday );

        $stmt_profile_id = $profile_id;
        $stmt_person_name = $person_name;
        $stmt_address = $address;
        $stmt_post_zone = $post_zone;
        $stmt_country = $country;
        $stmt_birthday = $birthday->format('Y-m-d');

        $stmt->execute();
        
        $stmt->close();
        $connection->close();
    }

    public function find()
    {

    }

    public function delete()
    {

    }

    public function update( $profile_id, 
                            $person_name, 
                            $address, 
                            $post_zone, 
                            $country, 
                            $birthday )
    {
        
    }
}

?>