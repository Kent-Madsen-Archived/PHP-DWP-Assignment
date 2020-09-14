<?php 
require_once 'objects/Article.php';
require_once 'cfg/config.php';

class ArticlesFactory
{
    public function __construct() 
    {
    
    }

    public function getLatestNews()
    {
        $retVal = array();

        $connection = new mysqli( database_server_name, 
                                  database_username_name, 
                                  database_password_name, 
                                  database_database_name );

        if( $connection->connect_error )
        {
            die("connection failed: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM articles order by registered desc limit 5;";

        $result = $connection->query( $sql );

        if ( $result->num_rows > 0 ) 
        {
            while( $row = $result->fetch_assoc() )
            {
                $article = new Article($row['identity'], $row['profile_id'], $row['title'], $row['content'], $row['registered']);
                array_push( $retVal, $article);
            }
        }


        $connection->close();
        return $retVal;
    }

}

?>