<?php 

class ImageLikeFactory
{
    function __construct() 
    {
        
    }

    public function imageLikes( $image_post_id )
    {
        $retval = 0;

        $connection = new mysqli( databaseServerHostname, 
                                  databaseServerUser, 
                                  databaseServerPass, 
                                  databaseServerDatabase );

        
        if ( $connection->connect_error ) 
        {
            die( "Connection failed: " . $connection->connect_error );
        } 

        $sql = "SELECT * FROM image_like_counter where image_post_identity=" . $image_post_id . ";";
        $result = $connection->query($sql);

        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $retval = $row['number_of_views'];
            }
        }

        $connection->close();

        return $retval;
    }

    public function imageIsLiked( $image_post_id, $byProfileId )
    {
        $connection = new mysqli( databaseServerHostname, 
                                  databaseServerUser, 
                                  databaseServerPass, 
                                  databaseServerDatabase );

        
        if ( $connection->connect_error ) 
        {
            die( "Connection failed: " . $connection->connect_error );
        } 

        
        $stmt = $connection->prepare("INSERT INTO image_like (image_post_identity, profile_identity) VALUES (?, ?)");
        $stmt->bind_param( "ii", $stmt_image_post_identity, $stmt_profile_identity );

        $stmt_image_post_identity = $image_post_id;
        $stmt_profile_identity = $byProfileId;

        $stmt->execute();

        $stmt->close();
        $connection->close();
    }

    public function removeLike( $image_post_id, $byProfileId )
    {
        $retval = false;

        $connection = new mysqli( databaseServerHostname, 
                                  databaseServerUser, 
                                  databaseServerPass, 
                                  databaseServerDatabase );

        
        if ( $connection->connect_error ) 
        {
            die( "Connection failed: " . $connection->connect_error );
        } 

        $sql = "delete from image_like where image_post_identity=" . $image_post_id . " and profile_identity=" . $byProfileId .  ";";

        if( $connection->query( $sql ) === true )
        {
            $retval = true;
        }
        else
        {

        }
        
        $connection->close();

        return $retval;
    }

    public function isImageLiked( $image_post_id, $byProfileId )
    {
        $retval = false;

        $connection = new mysqli( databaseServerHostname, 
                                  databaseServerUser, 
                                  databaseServerPass, 
                                  databaseServerDatabase );

        
        if ( $connection->connect_error ) 
        {
            die( "Connection failed: " . $connection->connect_error );
        } 

        $sql = "select * from image_like where profile_identity=". $byProfileId ." and image_post_identity=". $image_post_id .";";
        $result=$connection->query( $sql );
        
        if ( $result->num_rows > 0 ) 
        {
            while( $row = $result->fetch_assoc() )
            {
                $retval = true;
            }
        }

        $connection->close();
        
        return $retval;
    }

}

?>