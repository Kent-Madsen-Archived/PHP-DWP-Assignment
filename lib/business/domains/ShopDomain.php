<?php
    /**
     *  Title: ShopDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ShopDomain
     */
    class ShopDomain 
        extends Domain
    {
        /**
         * ShopDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }

    }

?>