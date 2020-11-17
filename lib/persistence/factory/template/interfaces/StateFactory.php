<?php

    /**
     * Interface StateFactory
     */
    interface StateFactory
    {
        /**
         * @return mixed
         */
        public function exist();

        
        /**
         * @return mixed
         */
        public function length();
    }

?>