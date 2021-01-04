<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductInvoiceController
     */
    class ProductInvoiceController
        extends BaseMVCController
    {
        /**
         * @param ProductInvoiceModel|null $model
         * @throws Exception
         */
        public function __construct( ?ProductInvoiceModel $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        public function validateModel( $model ): bool
        {
            if($model instanceof ProductInvoiceModel)
            {
                return true;
            }
            return false;
        }


        /**
         * @param $var
         */
        public function controllerTotalPrice( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerRegistered( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerAddress( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerMail( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerOwnerName( $var ): void
        {

        }

        public function getTotalPrice():?float
        {
            return $this->getModel()->getTotalPrice();
        }

        public function getProfileId():?float
        {
            return $this->getModel()->getProfileId();
        }


        public function getRegistered()
        {
            return $this->getModel()->getRegistered();
        }

        public function getAddress(): ?int
        {
            return $this->getModel()->getAddressId();
        }

        public function getMail(): ?int
        {
            return $this->getModel()->getMailId();
        }

        public function getOwnerName(): ?int
        {
            return $this->getModel()->getOwnerNameId();
        }
    }
?>