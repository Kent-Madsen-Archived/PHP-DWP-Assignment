<?php

    /**
     * Class RouterValidateArgument
     */
    abstract class RouterValidateArgument
    {
        // Variables
        public abstract function validateArgumentLevel( $arg );

        private $level = 0;

        private $is_validated = null;
        private $value = null;


        // accessors
        /**
         * @return int|null
         */
        final public function getLevel(): ?int
        {
            if( is_null( $this->level ) )
            {
                return null;
            }

            return $this->level;
        }


        /**
         * @return null
         */
        public function getValue()
        {
            if( is_null( $this->value ) )
            {
                return null;
            }

            return $this->value;
        }


        /**
         * @return bool|null
         */
        final public function getIsValidated(): ?bool
        {
            if( is_null( $this->value ) )
            {
                return null;
            }

            return boolval( $this->value );
        }


        /**
         * @param $var
         * @return bool|null
         * @throws Exception
         */
        final public function setIsValidated( $var ): ?bool
        {
            if( is_null( $var ) )
            {
                $this->is_validated = null;
                return $this->getIsValidated();
            }

            if( !is_bool( $var ) )
            {
                throw new Exception('only boolean is allowed' );
            }

            $this->is_validated = boolval( $var );

            return $this->getIsValidated();
        }


        /**
         * @param $level
         * @return int|null
         */
        final public function setLevel( $level = CONSTANT_ZERO ): ?int
        {
            if( is_null( $level ) )
            {
                return null;
            }

            $this->level = intval( $level );

            return $this->getLevel();
        }


        /**
         * @param $var
         * @return null
         */
        final public function setValue( $var )
        {
            if( is_null( $var ) )
            {
                $this->value = null;
                return $this->getValue();
            }

            $this->value = $var;
            return $this->getValue();
        }
    }

?>