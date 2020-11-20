<?php

    /**
     * Interface StateFactory
     */
    interface StateFactory
    {
        /**
         * @return bool
         */
        public function exist(): bool;


        /**
         * @return int
         */
        public function length(): int;
    }

?>