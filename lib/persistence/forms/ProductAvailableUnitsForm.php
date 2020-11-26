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
        extends DatabaseForm
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
        public function getTitle()
        {
            return $this->title;
        }


        /**
         * @return null
         */
        public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return null
         */
        public function getAvailableUnit()
        {
            return $this->availableUnit;
        }


        /**
         * @return null
         */
        public function getDescription()
        {
            return $this->description;
        }


        /**
         * @return null
         */
        public function getPrice()
        {
            return $this->price;
        }


        /**
         * @param null $availableUnit
         */
        public function setAvailableUnit($availableUnit): void
        {
            $this->availableUnit = $availableUnit;
        }


        /**
         * @param null $description
         */
        public function setDescription($description): void
        {
            $this->description = $description;
        }


        /**
         * @param null $price
         */
        public function setPrice($price): void
        {
            $this->price = $price;
        }


        /**
         * @param null $title
         */
        public function setTitle($title): void
        {
            $this->title = $title;
        }


        /**
         * @param null $identity
         */
        public function setIdentity($identity): void
        {
            $this->identity = $identity;
        }
    }

?>