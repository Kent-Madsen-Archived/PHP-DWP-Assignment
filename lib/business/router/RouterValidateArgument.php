<?php

    abstract class RouterValidateArgument
    {
        public abstract function validateArgumentLevel( $arg );

        private $level = 0;

        /**
         * @return int
         */
        public function getLevel()
        {
            return $this->level;
        }

        /**
         * @param int $level
         */
        public function setLevel( $level )
        {
            $this->level = $level;
        }
    }

?>