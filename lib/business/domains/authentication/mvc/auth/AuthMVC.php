<?php

abstract class AuthMVC
    extends DomainMVC
{
    public function validateInstance($class)
    {
        if( $class instanceof AuthDomain )
        {
            return true;
        }

        return false;
    }

}

?>