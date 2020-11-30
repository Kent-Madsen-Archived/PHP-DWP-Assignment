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
        extends DatabaseFormEntity
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
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return null
         */
        final public function getAddress()
        {
            return $this->address;
        }


        /**
         * @return null
         */
        final public function getMail()
        {
            return $this->mail;
        }


        /**
         * @return null
         */
        final public function getName()
        {
            return $this->name;
        }


        /**
         * @return null
         */
        final public function getTotalPrice()
        {
            return $this->totalPrice;
        }


        /**
         * @return null
         */
        final public function getRegistered()
        {
            return $this->registered;
        }


            // Setters
        /**
         * @param null $identity
         */
        final public function setIdentity( $identity ): void
        {
            $this->identity = $identity;
        }


        /**
         * @param null $address
         */
        final public function setAddress( $address ): void
        {
            $this->address = $address;
        }


        /**
         * @param null $mail
         */
        final public function setMail( $mail ): void
        {
            $this->mail = $mail;
        }


        /**
         * @param null $name
         */
        final public function setName( $name ): void
        {
            $this->name = $name;
        }


        /**
         * @param null $registered
         */
        final public function setRegistered( $registered ): void
        {
            $this->registered = $registered;
        }


        /**
         * @param null $totalPrice
         */
        final public function setTotalPrice( $totalPrice ): void
        {
            $this->totalPrice = $totalPrice;
        }
    }

?>