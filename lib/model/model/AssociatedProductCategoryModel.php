<?php 

    class AssociatedProductCategoryModel 
        extends DatabaseModel
    {
        public function __construct()
        {

        }   

        private $identity = null;
        
        private $product_attribute_id;
        private $product_category_id;
        private $product_id;

    }

?>