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
    {
        /**
         * @return mixed
         */
        public function viewIdentity();

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