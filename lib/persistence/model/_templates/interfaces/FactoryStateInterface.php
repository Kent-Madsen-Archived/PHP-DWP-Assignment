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
    interface FactoryStateInterface
    {
        /**
         * Check if the factory, "exist" in the database.
         * @return bool
         */
        public function exist(): bool;


        /**
         * Get the factory, current size. ie. all entities in the database
         * @return int
         */
        public function length(): int;


        /**
         * @param array $filter
         * @return mixed
         */
        public function lengthCalculatedWithFilter(array $filter );
    }

?>