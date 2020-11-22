<?php
    /**
     *  Title: CheckoutDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class CheckoutDomain
     */
    class CheckoutDomain 
        extends Domain
    {
        /**
         * CheckoutDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }

    }

?>