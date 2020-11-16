<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonNameView
     */
    interface PersonNameView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewFirstname();

        /**
         * @return mixed
         */
        public function viewLastname();


        /**
         * @return mixed
         */
        public function viewMiddlename();

    }
?>