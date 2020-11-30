<?php

abstract class AdminMVC
    extends DomainMVC
{
    public function validateInstance($class)
    {
        if( $class instanceof AdminDomain )
        {
            return true;
        }

        return false;
    }
}

?>