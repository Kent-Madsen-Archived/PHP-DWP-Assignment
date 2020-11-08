<?php 

    /**
     * 
     */
    class ProductModel 
        extends DatabaseModel
            implements ProductView, 
                       ProductController
    {
        // constructors
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


    }


?>