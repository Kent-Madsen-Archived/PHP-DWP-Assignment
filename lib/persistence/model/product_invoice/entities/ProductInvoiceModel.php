<?php

    /**
     * Class ProductInvoiceModel
     */
    class ProductInvoiceModel
        extends DatabaseModelEntity
    {
        // Constructors
        /**
         * ProductInvoiceModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct($factory)
        {
            $this->setFactory($factory);
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
        }


        // Variables
        private $total_price = null;
        private $invoice_registered = null;

        private $address_id = null;
        private $mail_id = null;
        private $owner_name_id = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if ( $factory instanceof ProductInvoiceFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        // Accessors
            // getters

        /**
         * @return int|null
         */
        final public function getAddressId()
        {
            if (is_null($this->address_id)) {
                return null;
            }

            return intval( $this->address_id, BASE_10 );
        }


        /**
         * @return int|null
         */
        final public function getMailId()
        {
            if (is_null($this->mail_id)) {
                return null;
            }

            return intval( $this->mail_id, BASE_10 );
        }


        /**
         * @return int|null
         */
        final public function getOwnerNameId()
        {
            if (is_null($this->owner_name_id)) {
                return null;
            }

            return intval( $this->owner_name_id, BASE_10 );
        }


        /**
         * @return float|null
         */
        final public function getTotalPrice()
        {
            if (is_null($this->total_price)) {
                return null;
            }

            return doubleval($this->total_price);
        }


        /**
         * @return |null
         */
        final public function getRegistered()
        {
            return $this->invoice_registered;
        }


        // Setters
        /**
         * @param $var
         */
        final public function setRegistered($var)
        {
            $this->invoice_registered = $var;
        }


        /**
         * @param $var
         */
        final public function setTotalPrice($var)
        {
            $this->total_price = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setAddressId($var)
        {
            if ( !is_int( $var ) )
            {
                throw new Exception('ProductInvoiceModel - setIdentity: null or numeric number is allowed');
            }

            $this->address_id = intval( $var, BASE_10 );
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setMailId($var)
        {
            if ( !is_int( $var ) )
            {
                throw new Exception('ProductInvoiceModel - setIdentity: null or numeric number is allowed');
            }

            $this->mail_id = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setOwnerNameId($var)
        {
            if ( !is_int( $var ) ) {
                throw new Exception('ProductInvoiceModel - setIdentity: null or numeric number is allowed');
            }

            $this->owner_name_id = $var;
        }

    }
?>