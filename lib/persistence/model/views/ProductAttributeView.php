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
    {
        /**
         * @return mixed
         */
        public function viewIdentity();

             /**
         * @return mixed
         */
        public function viewContent();

    }
?>