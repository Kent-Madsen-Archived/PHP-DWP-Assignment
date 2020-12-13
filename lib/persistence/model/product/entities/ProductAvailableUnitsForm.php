<?php
    /**
     *  Title: ProductAvailableUnitsForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ProductAvailableUnitsForm
     */
    class ProductAvailableUnitsForm
        extends DatabaseFormEntity
    {
        /**
         * ProductAvailableUnitsForm constructor.
         */
        public function __construct()
        {
            $this->setIsSet( false );
        }


        // Variables
        private $identity = null;

        private $title = null;
        private $description = null;

        private $price = null;

        private $availableUnit = null;


        // Accessors
        /**
         * @return null
         */
        final public function getTitle()
        {
            return $this->title;
        }


        /**
         * @return null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return null
         */
        final public function getAvailableUnit()
        {
            return $this->availableUnit;
        }


        /**
         * @return null
         */
        final public function getDescription()
        {
            return $this->description;
        }


        /**
         * @return null
         */
        final public function getPrice()
        {
            return $this->price;
        }


        /**
         * @param null $availableUnit
         */
        final public function setAvailableUnit( $availableUnit ): void
        {
            $this->availableUnit = $availableUnit;
        }


        /**
         * @param null $description
         */
        final public function setDescription( $description ): void
        {
            $this->description = $description;
        }


        /**
         * @param null $price
         */
        final public function setPrice( $price ): void
        {
            $this->price = $price;
        }


        /**
         * @param null $title
         */
        final public function setTitle( $title ): void
        {
            $this->title = $title;
        }


        /**
         * @param null $identity
         */
        final public function setIdentity( $identity ): void
        {
            $this->identity = $identity;
        }
    }

?>