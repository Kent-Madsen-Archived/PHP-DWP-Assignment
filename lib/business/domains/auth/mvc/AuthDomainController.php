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

        // Variables
        private $domain = null;


        // Accessors
        /**
         * @param $domain
         * @return AuthDomain|null
         * @throws Exception
         */
        public function setDomain( $domain ): ?AuthDomain
        {
            if( is_null( $domain ) )
            {
                $this->domain = null;
                return $this->getDomain();
            }

            if( !( $domain instanceof AuthDomain ) )
            {
                throw new Exception('only instances of AuthDomain is allowed as parameters');
            }

            $this->domain = $domain;
            return $this->getDomain();
        }


        /**
         * @return AuthDomain|null
         */
        public function getDomain(): ?AuthDomain
        {
            if( is_null( $this->domain ) )
            {
                return null;
            }

            return $this->domain;
        }
    }
?>