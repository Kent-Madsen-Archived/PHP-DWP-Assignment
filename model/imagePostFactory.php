<?php 
require 'objects/imagePost.php';

class ImagePostFactory
{
    public function read()
    {
        $retval = array();

        $connection = new mysqli( databaseServerHostname, 
                                  databaseServerUser, 
                                  databaseServerPass, 
                                  databaseServerDatabase );

        if ( $connection->connect_error ) 
        {
            die("Connection failed: " . $connection->connect_error);
        }                          
        
        $sql = "select * from image_post;";
        $result = $connection->query($sql);
        
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $newImagePost = new ImagePost( $row['identity'], 
                                               $row['source'], 
                                               $row['profile_identity_owner'],
                                               $row['title'],
                                               $row['summary'],
                                               $row['registered']);

                array_push($retval, $newImagePost);
            }
        }

        $connection->close();

        return $retval;
    }

    public function create( $source, $profile_owner, $title, $summary )
    {
        $connection = new mysqli( databaseServerHostname, 
                                  databaseServerUser, 
                                  databaseServerPass, 
                                  databaseServerDatabase );

        if ( $connection->connect_error ) 
        {
            die("Connection failed: " . $connection->connect_error);
        }

        
        $stmt = $connection->prepare("INSERT INTO image_post (source, profile_identity_owner, title, summary) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $stmt_source, $stmt_profile_identity, $stmt_title, $stmt_summary);

        $stmt_source = $source;
        $stmt_profile_identity = $profile_owner;
        $stmt_title = $title;
        $stmt_summary = $summary;

        $stmt->execute();

        $stmt->close();
        $connection->close();
    }

}

?>