<?php
    /**
     *  Title: StateFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Interface
     *  Project: DWP-Assignment
     */

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