<?php 

    class ProfileFactory 
        extends Factory
    {
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

    }

?>