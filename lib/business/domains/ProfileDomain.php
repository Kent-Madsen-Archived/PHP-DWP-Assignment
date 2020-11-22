<?php
    /**
     *  Title: ProfileDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ProfileDomain
     */
    class ProfileDomain 
        extends Domain
    {
        /**
         * ProfileDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }


        

    }

?>