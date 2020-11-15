<?php 

    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonEmailView
     */
    interface PersonEmailView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewContent();
    }

?>