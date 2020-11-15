<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Interface ProfileTypeView
     */
    interface ProfileTypeView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewContent();

    }
?>