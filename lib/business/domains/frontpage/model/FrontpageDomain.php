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
            implements FrontpageInteraction
    {
        /**
         *
         */
        public const class_name = 'FrontpageDomain';


        // Construct
        /**
         * FrontpageDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }

    }

?>