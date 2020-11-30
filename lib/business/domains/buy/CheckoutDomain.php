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
            implements CheckoutInteraction
    {
        /**
         *
         */
        public const class_name = "CheckoutDomain";

        /**
         * CheckoutDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }

    }

?>