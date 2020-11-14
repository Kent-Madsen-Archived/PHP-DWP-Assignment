<?php

    abstract class RouterValidateArgument
    {
        public abstract function validateArgumentLevel( $arg );

        private $level = 0;
        private $value = null;

        /**
         * @return int
         */
        public function getLevel()
        {
            return $this->level;
        }

        public function getValue()
        {
            return $this->value;
        }

        /**
         * @param int $level
         */
        public function setLevel( $level )
        {
            $this->level = $level;
        }

        public function setValue( $var )
        {
            $this->value = $var;
        }
    }

?>