<?php 

    class ImageTypeModel
        extends DatabaseModel
    {
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }
        
    }

?>