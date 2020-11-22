<?php
    /**
     *  Title: InvoiceDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
    */

    /**
     * Class InvoiceDomain
     */
    class InvoiceDomain 
        extends Domain
    {
        /**
         * InvoiceDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }
        
    }

?>