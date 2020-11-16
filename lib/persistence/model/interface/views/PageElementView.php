<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PageElementView
     */
    interface PageElementView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewContent();

        /**
         * @return mixed
         */
        public function viewAreaKey();

        /**
         * @return mixed
         */
        public function viewTitle();

        /**
         * @return mixed
         */
        public function viewCreatedOn();

        /**
         * @return mixed
         */
        public function viewLastUpdate();
    }
?>