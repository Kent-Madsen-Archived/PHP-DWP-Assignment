<?php

abstract class AccessPrivilegesMVC
    extends DomainMVC
{
    public function validateInstance($class)
    {
        if($class instanceof AccessPrivilegesDomain)
        {
            return true;
        }

        return false;
    }

}

?>