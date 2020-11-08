<?php 

    /**
     * 
     */
    class ProfileTypeModel 
        extends DatabaseModel
            implements ProfileTypeController, 
                       ProfileTypeView
    {
        // constructors
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // variables

        
        // accessors


    }


?>