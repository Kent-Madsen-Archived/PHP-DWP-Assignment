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


        // implement interfaces
        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return $retVal;
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


        /**
         * @return mixed|void
         */
        final public function viewId()
        {
            return $this->getIdentity();
        }


        /**
         * @return mixed|void
         */
        final public function viewTotalPrice()
        {
            return $this->getTotalPrice();
        }


        /**
         * @return mixed|void
         */
        final public function viewOwnerAddress()
        {
            return $this->getAddressId();
        }


        /**
         * @return mixed|null
         */
        final public function viewOwnerMail()
        {
            return $this->getMailId();
        }


        /**
         * @return mixed|null
         */
        final public function viewOwnerName()
        {
            return $this->getOwnerNameId();
        }


        // Accessors
            // getters
        /**
         * @return int|null
         */
        final public function getIdentity()
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return intval( $this->identity, self::base() );;
        }


        /**
         * @return int|null
         */
        final public function getAddressId()
        {
            if( is_null( $this->address_id ) )
            {
                return null;
            }

            return intval( $this->address_id, self::base() );
        }


        /**
         * @return int|null
         */
        final public function getMailId()
        {
            if( is_null( $this->mail_id ) )
            {
                return null;
            }

            return intval( $this->mail_id, self::base() );
        }


        /**
         * @return int|null
         */
        final public function getOwnerNameId()
        {
            if( is_null( $this->owner_name_id ) )
            {
                return null;
            }

            return intval( $this->owner_name_id, self::base() );
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
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProductInvoiceModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
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
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProductInvoiceModel - setIdentity: null or numeric number is allowed' );
            }

            $this->address_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setMailId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProductInvoiceModel - setIdentity: null or numeric number is allowed' );
            }

            $this->mail_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setOwnerNameId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProductInvoiceModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->owner_name_id = $value;
        }


        /**
         * @param $identity
         * @param $total_price
         * @param $registered
         * @param $address_id
         * @param $mail_id
         * @param $owner_name_id
         * @return ProductInvoiceModel
         * @throws Exception
         */
        final public static function GenerateProductInvoiceModelBase( $identity,
                                                                      $total_price,
                                                                      $registered,
                                                                      $address_id,
                                                                      $mail_id,
                                                                      $owner_name_id )
        {
            return self::GenerateProductInvoiceModel(   $identity,
                                                        $total_price,
                                                        $registered,
                                                        $address_id,
                                                        $mail_id,
                                                        $owner_name_id,
                                                        null);
        }

        
        /**
         * @param $identity
         * @param $total_price
         * @param $registered
         * @param $address_id
         * @param $mail_id
         * @param $owner_name_id
         * @param $factory
         * @return ProductInvoiceModel
         * @throws Exception
         */
        final public static function GenerateProductInvoiceModel( $identity,
                                                                  $total_price,
                                                                  $registered,
                                                                  $address_id,
                                                                  $mail_id,
                                                                  $owner_name_id,
                                                                  $factory )
        {
            $object = new ProductInvoiceModel( $factory );

            $object->setIdentity( $identity );
            $object->total_price( $total_price );

            $object->setRegistered( $registered );

            $object->setAddressId( $address_id );
            $object->setMailId( $mail_id );
            $object->setOwnerNameId( $owner_name_id );

            return $object;
        }

    }

?>