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
        public function __construct( ProductInvoiceFactory $factory )
        {
            $this->setFactory($factory);
        }


        /**
         * @return bool
         */
        final public function requiredFieldsValidated(): bool
        {

            $total_price_has_input = !is_null($this->total_price);
            $address_id_has_input = !is_null($this->address_id);
            $person_name_id_has_input = !is_null($this->owner_name_id);
            $mail_id_has_input = !is_null($this->mail_id);

            $retVal = ($total_price_has_input&&$person_name_id_has_input&&$address_id_has_input&&$mail_id_has_input);

            return boolval( $retVal );
        }


        // Variables
        private $total_price = null;
        private $invoice_registered = null;

        private $address_id = null;
        private $mail_id = null;
        private $owner_name_id = null;
        private $profile_id = null;


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
        public final function getProfileId(): ?int
        {
            return $this->profile_id;
        }



        /**
         * @return int
         */
        final public function getAddressId(): int
        {
            return $this->address_id;
        }


        /**
         * @return int
         */
        final public function getMailId(): int
        {
            return $this->mail_id;
        }


        /**
         * @return int
         */
        final public function getOwnerNameId(): int
        {
            return $this->owner_name_id;
        }


        /**
         * @return float
         */
        final public function getTotalPrice(): float
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
         */
        final public function setRegistered( $var )
        {
            $this->invoice_registered = $var;
        }


        /**
         * @param int|null $profile_id
         */
        public final function setProfileId( ?int $profile_id ): void
        {
            $this->profile_id = $profile_id;
        }


        /**
         * @param float|null $var
         */
        final public function setTotalPrice( ?float $var ): void
        {
            $this->total_price = $var;
        }


        /**
         * @param int|null $var
         */
        final public function setAddressId( ?int $var ): void
        {
            $this->address_id = $var;
        }


        /**
         * @param int|null $var
         */
        final public function setMailId( ?int $var ): void
        {
            $this->mail_id = $var;
        }


        /**
         * @param $var
         */
        final public function setOwnerNameId( ?int $var ): void
        {
            $this->owner_name_id = $var;
        }

    }
?>