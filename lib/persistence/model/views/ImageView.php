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
        extends BaseEntityView
    {
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