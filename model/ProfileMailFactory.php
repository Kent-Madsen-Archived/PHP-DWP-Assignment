<?php 
require 'ProfileMail.php';

const database_server_name = "localhost";
const database_username_name = "root";
const database_password_name = "";
const database_database_name = "dwp_assignment";

class ProfileMailFactory
{
    public function create( $profileIdentity, $profile_email, $is_primary )
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

        $stmt = $connection->prepare( "INSERT INTO profile_mail (profile_id, profile_email, primary_mail) VALUES (?, ?, ?)" );

        $stmt->bind_param( "isb", 
                           $stmt_profile_id, 
                           $stmt_profile_email, 
                           $stmt_is_primary_mail );

        $stmt_profile_id = $profileIdentity;
        $stmt_profile_email = $profile_email;
        $stmt_is_primary_mail = $is_primary;

        $stmt->execute();

        $stmt->close();
        // luk forbindelsen
        $connection->close();
    }

    public function update( $identity, $email )
    {
        
    }

    public function findByEmail( $email )
    {
        $retVal = null;
        
        $connection = new mysqli( database_server_name, 
                                  database_username_name, 
                                  database_password_name, 
                                  database_database_name );

        // Muligt at få forbindelse?
        if( $connection -> connect_error )
        {
            die( "connection failed: " . $connection->connect_error );
        }

        $sql = "SELECT * FROM profile_mail where lower(profile_email)=lower('". $email . "')";
        $result = $connection->query($sql);

        if ( $result->num_rows > 0 ) 
        {
            $found_identity;
            $found_profile_id;

            $found_profile_email;
            $found_profile_email_registered;

            $found_primary_mail;

            // output data of each row
            while( $row = $result->fetch_assoc() ) 
            {
                $found_identity = $row['identity'];
                $found_profile_id = $row['profile_id'];

                $found_profile_email = $row['profile_email'];
                $found_profile_email_registered = $row['profile_email_registered'];

                $found_primary_mail = $row['primary_mail'];
            }

            $retVal = new ProfileMail( $found_identity, 
                                       $found_profile_id, 
                                       $found_profile_email, 
                                       $found_profile_email_registered, 
                                       $found_primary_mail);
        } 

        
        // luk forbindelsen
        $connection->close();

        return $retVal;
    }

    public function findAllByProfileIdentity( $profileIdentity )
    {
        $retVal = array();

        $connection = new mysqli( database_server_name, 
                                  database_username_name, 
                                  database_password_name, 
                                  database_database_name );

        // Muligt at få forbindelse?
        if( $connection -> connect_error )
        {
            die( "connection failed: " . $connection->connect_error );
        }

        
        $sql = "SELECT * FROM profile_mail where profile_id=" . $profileIdentity . ";";
        $result = $connection->query( $sql );

        if ( $result->num_rows > 0 ) 
        {
            // output data of each row
            while( $row = $result->fetch_assoc() ) 
            {
                $new_profile = new ProfileMail( $row['identity'], $row['profile_id'], 
                                                $row['profile_email'], $row['profile_email_registered'],
                                                $row['primary_mail']);

                array_push( $retVal, $new_profile);
            }
          }
          else
          {
            $retVal = null;
          }
        
        $connection->close();

        return $retVal;
    }

    public function findPrimaryMailByProfileIdentity( $profileIdentity )
    {
        $retVal = null;

        return $retVal;
    }


    

    public function delete( $identity )
    {
        
    }
}
?>