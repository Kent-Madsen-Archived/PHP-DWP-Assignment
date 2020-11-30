<?php

    /**
     * Class DatabaseModelEntity
     */
    abstract class DatabaseModelEntity
    {

        // Variables
        private $factory = null;
        private $identity = null;


        // accessor functions
            // getters
        /**
         * @return null
         */
        final public function getFactory()
        {
            return $this->factory;
        }


        /**
         * @return int|null
         */
        final public function getIdentity(): ?int
        {
            if( $this->isIdentityNull() )
            {
                return null;
            }

            return intval( $this->identity, BASE_10 );
        }


        /**
         * @return bool
         */
        final protected function isIdentityNull()
        {
            return is_null( $this->identity );
        }

            // Setters
        /**
         * @param $factory
         * @throws Exception
         */
        final public function setFactory( $factory )
        {
            if( is_null( $factory ) )
            {
                $this->factory = $factory;
                return;
            }

            if( !$this->validateFactory( $factory ) )
            {
                throw new Exception( 'Error: Factory instance is of the wrong type. ' );
            }
            
            $this->factory = $factory;
        }


        /**
         * @param $identity
         * @return int|null
         * @throws Exception
         */
        final public function setIdentity( $identity ): ?int
        {
            if( is_null( $identity ) )
            {
                $this->identity = null;
                return null;
            }

            if( !is_int( $identity ) )
            {
                throw new Exception('');
            }

            $this->identity = intval( $identity, BASE_10 );
            return $this->getIdentity();
        }


        /**
         * @return mixed
         */
        public abstract function requiredFieldsValidated();


        /**
         * @param $factory
         * @return mixed
         */
        protected abstract function validateFactory( $factory );
    }
?>