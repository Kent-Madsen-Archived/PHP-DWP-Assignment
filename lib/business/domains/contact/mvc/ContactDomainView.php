<?php
    /**
     *  Title: ContactDomainView
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ContactDomainView
     */
    class ContactDomainView
        extends ContactMVC
    {
        /**
         * ContactDomainView constructor.
         */
        public function __construct( $domain )
        {
            $this->setDomain( $domain );
        }



    }


?>