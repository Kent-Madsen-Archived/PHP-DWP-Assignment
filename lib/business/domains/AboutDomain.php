<?php
    /**
     *  Title: AboutDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
    */

    /**
     * Class AboutDomain
     */
    class AboutDomain 
        extends Domain
    {
        /**
         * AboutDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }

    }

?>