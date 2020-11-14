<?php 

    interface SetupFactory
    {
        /**
         * 
         */
        public function setup();
        
        /**
         * 
         */
        public function setupSecondaries();

        /**
         * 
         */
        public function insert_base_data();
    }

?>