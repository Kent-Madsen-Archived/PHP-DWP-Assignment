<?php

    /**
     * Class ProductInvoiceModel
     */
    class ProductInvoiceModel 
        extends DatabaseModel
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
        private $identity = null;

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
        final public function getIdentity()
        {
            if (is_null($this->identity)) {
                return null;
            }

            return intval($this->identity, self::base());;
        }


        /**
         * @return int|null
         */
        final public function getAddressId()
        {
            if (is_null($this->address_id)) {
                return null;
            }

            return intval($this->address_id, self::base());
        }


        /**
         * @return int|null
         */
        final public function getMailId()
        {
            if (is_null($this->mail_id)) {
                return null;
            }

            return intval($this->mail_id, self::base());
        }


        /**
         * @return int|null
         */
        final public function getOwnerNameId()
        {
            if (is_null($this->owner_name_id)) {
                return null;
            }

            return intval($this->owner_name_id, self::base());
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
         * @throws Exception
         */
        public function setIdentity($var)
        {
            $value = filter_var($var, FILTER_VALIDATE_INT);

            if (!$this->identityValidation($value)) {
                throw new Exception('ProductInvoiceModel - setIdentity: null or numeric number is allowed');
            }

            $this->identity = $value;
        }


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
            $value = filter_var($var, FILTER_VALIDATE_INT);

            if (!$this->identityValidation($value)) {
                throw new Exception('ProductInvoiceModel - setIdentity: null or numeric number is allowed');
            }

            $this->address_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setMailId($var)
        {
            $value = filter_var($var, FILTER_VALIDATE_INT);

            if (!$this->identityValidation($value)) {
                throw new Exception('ProductInvoiceModel - setIdentity: null or numeric number is allowed');
            }

            $this->mail_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setOwnerNameId($var)
        {
            $value = filter_var($var, FILTER_VALIDATE_INT);

            if (!$this->identityValidation($value)) {
                throw new Exception('ProductInvoiceModel - setIdentity: null or numeric number is allowed');
            }

            $this->owner_name_id = $value;
        }

    }
?>