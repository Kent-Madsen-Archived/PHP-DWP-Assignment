<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductUsedImageView
     */
    interface ProductUsedImageView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewProduct();

        /**
         * @return mixed
         */
        public function viewImageFull();

        /**
         * @return mixed
         */
        public function viewImagePreview();

        /**
         * @return mixed
         */
        public function viewIsProfileImage();
    }
?>