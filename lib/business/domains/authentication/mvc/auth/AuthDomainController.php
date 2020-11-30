<?php
    /**
     *  Title: AuthDomainController
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class AuthDomainController
     */
    class AuthDomainController
        extends AuthMVC
    {
        /**
         * AuthDomainController constructor.
         * @param $domain
         * @throws Exception
         */
        public function __construct( $domain )
        {
            $this->setDomain( $domain );

        }


    }
?>