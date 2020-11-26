<?php
    /**
     *  Title: ProductAssociatedCategoryForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ProductAssociatedCategoryForm
     */
    class ProductAssociatedCategoryForm
        extends DatabaseForm
    {
        /**
         * ProductAssociatedCategoryForm constructor.
         */
        public function __construct()
        {
            $this->setIsSet( false );
        }


        // Variables
        private $productCategory = null;
        private $productAttribute = null;

        private $productId = null;


        // Accessors
            // Getters
        /**
         * @return null
         */
        public function getProductAttribute()
        {
            return $this->productAttribute;
        }


        /**
         * @return null
         */
        public function getProductCategory()
        {
            return $this->productCategory;
        }


        /**
         * @return null
         */
        public function getProductId()
        {
            return $this->productId;
        }


            // Setters
        /**
         * @param null $productAttribute
         */
        public function setProductAttribute($productAttribute): void
        {
            $this->productAttribute = $productAttribute;
        }


        /**
         * @param null $productCategory
         */
        public function setProductCategory($productCategory): void
        {
            $this->productCategory = $productCategory;
        }


        /**
         * @param null $productId
         */
        public function setProductId($productId): void
        {
            $this->productId = $productId;
        }
        
    }

?>