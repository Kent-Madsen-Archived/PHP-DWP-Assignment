<?php
    /**
     *  Title: ProductInvoiceForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */


    class ProductInvoiceForm
        extends DatabaseForm
    {
        public function __construct()
        {
            $this->setIsSet( false );
        }


        // Variables
        private $identity = null;

        private $total_price = null;
        private $registered = null;

        private $address_country = null;
        private $address_street_name = null;
        private $address_number = null;
        private $zip_code = null;

        private $mailTo = null;

        private $firstname = null;
        private $lastname = null;
        private $middlename = null;


        // Accessors
            // Getters
        /**
         * @return null
         */
        final public function getRegistered()
        {
            return $this->registered;
        }


        /**
         * @return null
         */
        final public function getTotalPrice()
        {
            return $this->total_price;
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
        final public function getMiddlename()
        {
            return $this->middlename;
        }


        /**
         * @return null
         */
        final public function getLastname()
        {
            return $this->lastname;
        }


        /**
         * @return null
         */
        final public function getFirstname()
        {
            return $this->firstname;
        }


        /**
         * @return null
         */
        final public function getAddressNumber()
        {
            return $this->address_number;
        }


        /**
         * @return null
         */
        final public function getAddressCountry()
        {
            return $this->address_country;
        }


        /**
         * @return null
         */
        final public function getAddressStreetName()
        {
            return $this->address_street_name;
        }


        /**
         * @return null
         */
        final public function getMailTo()
        {
            return $this->mailTo;
        }


        /**
         * @return null
         */
        final public function getZipCode()
        {
            return $this->zip_code;
        }


            // Setters
        /**
         * @param null $registered
         */
        final public function setRegistered( $registered ): void
        {
            $this->registered = $registered;
        }

        /**
         * @param null $identity
         */
        final public function setIdentity( $identity ): void
        {
            $this->identity = $identity;
        }


        /**
         * @param null $middlename
         */
        final public function setMiddlename( $middlename ): void
        {
            $this->middlename = $middlename;
        }


        /**
         * @param null $lastname
         */
        final public function setLastname( $lastname ): void
        {
            $this->lastname = $lastname;
        }


        /**
         * @param null $address_number
         */
        final public function setAddressNumber( $address_number ): void
        {
            $this->address_number = $address_number;
        }


        /**
         * @param null $firstname
         */
        final public function setFirstname( $firstname ): void
        {
            $this->firstname = $firstname;
        }


        /**
         * @param null $address_streetname
         */
        final public function setAddressStreetName( $address_streetname ): void
        {
            $this->address_street_name = $address_streetname;
        }


        /**
         * @param null $address_country
         */
        final public function setAddressCountry( $address_country ): void
        {
            $this->address_country = $address_country;
        }


        /**
         * @param null $mailTo
         */
        final public function setMailTo( $mailTo ): void
        {
            $this->mailTo = $mailTo;
        }


        /**
         * @param null $total_price
         */
        final public function setTotalPrice( $total_price ): void
        {
            $this->total_price = $total_price;
        }


        /**
         * @param null $zip_code
         */
        final public function setZipCode( $zip_code ): void
        {
            $this->zip_code = $zip_code;
        }
    }


?>