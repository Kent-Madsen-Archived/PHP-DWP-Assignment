<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductUsedImageController
     */
    interface ProductUsedImageController
    {

        /**
         * @param $var
         * @return mixed
         */
        public function controllerProduct( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerImageFull( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerImagePreview( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerIsProfileImage( $var );
    }
?>