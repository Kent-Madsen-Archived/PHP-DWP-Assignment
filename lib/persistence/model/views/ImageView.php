<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ImageView
     */
    interface ImageView
    {
        /**
         * @return mixed
         */
        public function viewIdentity();

        /**
         * @return mixed
         */
        public function viewImageSrc();

        /**
         * @return mixed
         */
        public function viewImageType();

        /**
         * @return mixed
         */
        public function viewTitle();

        /**
         * @return mixed
         */
        public function viewAlt();

        /**
         * @return mixed
         */
        public function viewParent();

        /**
         * @return mixed
         */
        public function viewRegistered();

        /**
         * @return mixed
         */
        public function viewLastUpdate();

    }
?>