<?php

    /**
     * Interface StateFactory
     */
    interface StateFactory
    {
        /**
         * @return mixed
         */
        public function exist_database();

        /**
         * @return mixed
         */
        public function length();  
    }

?>