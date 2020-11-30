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
            implements AdminInteraction
    {
        /**
         *
         */
        public const class_name = "AdminDomain";


        /**
         * AdminDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name);
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }

    }

?>