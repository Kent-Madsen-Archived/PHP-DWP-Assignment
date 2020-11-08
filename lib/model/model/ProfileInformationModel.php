<?php 
    class ProfileInformationModel 
        extends DatabaseModel 
            implements ProfileInformationView, 
                       ProfileInformationController
    {
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


    }
?>