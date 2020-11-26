<?php

    /**
     * Class DatabaseForm
     */
    abstract class DatabaseForm
    {

        // Variable
        private $isSet = null;


        // Accessors
            // Getters
        /**
         * @return bool|null
         */
        final public function getIsSet(): ?bool
        {
            return $this->isSet;
        }


            // Setters
        /**
         * @param $isSet
         * @return bool|null
         */
        final protected function setIsSet( $isSet ): ?bool
        {
            $this->isSet = $isSet;

            return $this->getIsSet();
        }


        /**
         *
         */
        final public function done()
        {
            $this->setIsSet(true );
        }

    }

?>