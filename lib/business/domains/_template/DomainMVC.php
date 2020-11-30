<?php

    abstract class DomainMVC
    {
        private $domain = null;

        /**
         * @param $domain
         * @return null
         * @throws Exception
         */
        public final function setDomain( $domain )
        {
            if(is_null($domain))
            {
                $this->domain = null;
                return $this->getDomain();
            }

            if(!$this->validateInstance($domain))
            {
                throw new Exception('');
            }

            $this->domain = $domain;
            return $this->getDomain();
        }


        /**
         * @return null
         */
        public final function getDomain()
        {
            if( is_null( $this->domain ) )
            {
                return null;
            }

            return $this->domain;
        }

        /**
         * @param $class
         * @return mixed
         */
        public abstract function validateInstance($class);
    }

?>