<?php 

    /**
     * 
     */
    class ProfileInformationModel 
        extends DatabaseModel 
            implements ProfileInformationView, 
                       ProfileInformationController
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