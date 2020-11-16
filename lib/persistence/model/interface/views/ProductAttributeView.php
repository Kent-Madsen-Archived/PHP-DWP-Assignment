<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductAttributeView
     */
    interface ProductAttributeView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewContent();

    }
?>