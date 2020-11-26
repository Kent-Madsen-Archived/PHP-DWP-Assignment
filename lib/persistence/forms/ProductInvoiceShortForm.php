<?php
    /**
     *  Title: ProductInvoiceShortForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ProductInvoiceShortForm
     */
    class ProductInvoiceShortForm
        extends DatabaseForm
    {
        /**
         * ProductInvoiceShortForm constructor.
         */
        public function __construct()
        {
            $this->setIsSet( false );
        }


        // Variables
        private $identity = null;
        private $totalPrice = null;
        private $registered = null;

        private $address = null;
        private $mail = null;
        private $name = null;


        // Accessors
            // Getters
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
        public function getAddress()
        {
            return $this->address;
        }


        /**
         * @return null
         */
        public function getMail()
        {
            return $this->mail;
        }


        /**
         * @return null
         */
        public function getName()
        {
            return $this->name;
        }


        /**
         * @return null
         */
        public function getTotalPrice()
        {
            return $this->totalPrice;
        }


        /**
         * @return null
         */
        public function getRegistered()
        {
            return $this->registered;
        }


            // Setters
        /**
         * @param null $identity
         */
        public function setIdentity($identity): void
        {
            $this->identity = $identity;
        }


        /**
         * @param null $address
         */
        public function setAddress($address): void
        {
            $this->address = $address;
        }


        /**
         * @param null $mail
         */
        public function setMail($mail): void
        {
            $this->mail = $mail;
        }


        /**
         * @param null $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }


        /**
         * @param null $registered
         */
        public function setRegistered($registered): void
        {
            $this->registered = $registered;
        }


        /**
         * @param null $totalPrice
         */
        public function setTotalPrice($totalPrice): void
        {
            $this->totalPrice = $totalPrice;
        }
    }

?>