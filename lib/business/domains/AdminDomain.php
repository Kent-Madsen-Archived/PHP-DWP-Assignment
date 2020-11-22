<?php
    /**
     *  Title: AdminDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class AdminDomain
     */
    class AdminDomain
        extends Domain
    {
        /**
         * AdminDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }

    }

?>