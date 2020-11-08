<?php 

    /**
     * 
     */
    class ProductModel 
        extends DatabaseModel
            implements ProductView, ProductController
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