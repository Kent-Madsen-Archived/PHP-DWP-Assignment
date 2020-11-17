<?php

    /**
     * Interface MySQLInformationInterface
     */
    interface MySQLInformationInterface
    {
        /**
         * @return string|null
         */
        public function retrieveHostname() :? string;

        /**
         * @return string|null
         */
        public function retrieveUsername() :? string;
        /**
         * @return string|null
         */
        public function retrievePassword() :? string;


        /**
         * @return int|null
         */
        public function retrievePort() :? int;
        /**
         * @return string|null
         */
        public function retrieveDatabase() :? string;
    }
?>