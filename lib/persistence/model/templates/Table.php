<?php

    /**
     * Interface TableEntity
     */
    interface TableEntity
    {
        /**
         * @return mixed
         */
        public function viewIdentity();

        /**
         * @return mixed
         */
        public function viewIsIdentityNull();
    }
?>