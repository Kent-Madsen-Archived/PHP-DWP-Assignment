<?php
    /**
     *  Title: AuthDomainView
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class AuthDomainView
     */
    class AuthDomainView
        extends AuthMVC
    {
        /**
         * AuthDomainView constructor.
         * @param $domain
         * @throws Exception
         */
        public function __construct( $domain )
        {
            $this->setDomain( $domain );

        }


    }
?>