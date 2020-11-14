<?php

    /**
     * Class ProductInvoiceModel
     */
    class ProductInvoiceModel 
        extends DatabaseModel
        implements ProductInvoiceView,
                   ProductInvoiceController
    {
        // Constructors
        /**
         * ProductInvoiceModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


        // Variables
        private $identity = null;

        private $total_price        = null;
        private $invoice_registered = null;

        private $address_id     = null;
        private $mail_id        = null;
        private $owner_name_id  = null;


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductInvoiceFactory )
            {
                return true;
            }

            return false;
        }


        // Accessors
            // getters
        /**
         * @return |null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return |null
         */
        final public function getAddressId()
        {
            return $this->address_id;
        }


        /**
         * @return |null
         */
        final public function getMailId()
        {
            return $this->mail_id;
        }


        /**
         * @return |null
         */
        final public function getOwnerNameId()
        {
            return $this->owner_name_id;
        }


        /**
         * @return |null
         */
        final public function getTotalPrice()
        {
            return $this->total_price;
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
        public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProductInvoiceModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }


        /**
         * @param $var
         */
        final public function setRegistered( $var )
        {
            $this->invoice_registered = $var;
        }


        /**
         * @param $var
         */
        final public function setTotalPrice( $var )
        {
            $this->total_price = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setAddressId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProductInvoiceModel - setIdentity: null or numeric number is allowed' );
            }

            $this->address_id = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setMailId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProductInvoiceModel - setIdentity: null or numeric number is allowed' );
            }

            $this->mail_id = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setOwnerNameId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProductInvoiceModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->owner_name_id = $var;
        }


    }

?>