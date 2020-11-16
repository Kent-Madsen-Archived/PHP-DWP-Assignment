<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ArticleView
     */
    interface ArticleView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewTitle();

        /**
         * @return mixed
         */
        public function viewContent();

        /**
         * @return mixed
         */
        public function viewCreatedOn();

        /**
         * @return mixed
         */
        public function viewLastUpdated();
    }
?>