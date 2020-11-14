<?php

    /**
     * Class RouterValidateArgument
     */
    abstract class RouterValidateArgument
    {
        // Variables
        public abstract function validateArgumentLevel( $arg );

        private $level = 0;
        private $value = null;

        // accessors
        /**
         * @return int
         */
        final public function getLevel()
        {
            return $this->level;
        }

        /**
         * @return null
         */
        final public function getValue()
        {
            return $this->value;
        }

        /**
         * @param int $level
         */
        final public function setLevel( $level )
        {
            $this->level = $level;
        }

        /**
         * @param $var
         */
        final public function setValue( $var )
        {
            $this->value = $var;
        }
    }

?>