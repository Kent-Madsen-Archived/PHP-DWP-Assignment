<?php
    /**
     *  Title: FrontpageDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class FrontpageDomain
     */
    class FrontpageDomain 
        extends Domain
    {
        // Construct
        /**
         * FrontpageDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }

    }

?>