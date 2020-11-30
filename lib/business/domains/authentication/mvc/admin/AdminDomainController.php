<?php

    class AdminDomainController
        extends AdminMVC
    {
        public function __construct( $domain )
        {
            $this->setDomain( $domain );
        }

    }

?>