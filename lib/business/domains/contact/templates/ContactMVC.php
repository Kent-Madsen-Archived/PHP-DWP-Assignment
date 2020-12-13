<?php

    abstract class ContactMVC
        extends DomainMVC
    {
        public function validateInstance($class)
        {
            if($class instanceof ContactDomain)
            {
                return true;
            }

            return false;
        }

    }

?>