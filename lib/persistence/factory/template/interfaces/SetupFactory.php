<?php

    /**
     * Interface SetupFactory
     */
    interface SetupFactory
    {
        /**
         * @return mixed
         */
        public function setup();

        /**
         * @return mixed
         */
        public function setupSecondaries();
    }

?>