<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ArticleController
     */
    interface ArticleController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerTitle( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerContent( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerCreatedOn( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerLastUpdated( $var );
    }

?>