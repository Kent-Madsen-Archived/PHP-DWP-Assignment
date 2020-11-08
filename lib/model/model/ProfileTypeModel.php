<?php 

    class ProfileTypeModel 
        extends DatabaseModel
            implements ProfileTypeController, 
                       ProfileTypeView
    {
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


    }


?>