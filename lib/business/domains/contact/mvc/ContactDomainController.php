<?php 

    class ContactDomainController
        extends ContactMVC
    {
        /**
         * ContactDomainController constructor.
         */
        public function __construct( $domain )
        {
            $this->setDomain( $domain );
        }

    }

?>