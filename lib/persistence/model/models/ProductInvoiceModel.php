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