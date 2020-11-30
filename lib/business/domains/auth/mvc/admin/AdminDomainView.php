<?php

class AdminDomainView
    extends AdminMVC
{
    public function __construct( $domain )
    {
        $this->setDomain( $domain );
    }

}

?>