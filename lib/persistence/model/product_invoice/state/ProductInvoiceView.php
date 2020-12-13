<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductInvoiceView
     */
    class ProductInvoiceView
    {
        /**
         * ProductInvoiceView constructor.
         * @param ProductInvoiceController|null $controller
         */
        public function __construct( ?ProductInvoiceController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @return ProductInvoiceController|null
         */
        public function getController(): ?ProductInvoiceController
        {
            return $this->controller;
        }

        /**
         * @param ProductInvoiceController|null $controller
         */
        public function setController( ?ProductInvoiceController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @param $model
         * @return bool
         */
        public final function validateModel( $model ): bool
        {
            $retval = false;
 
            if( $model instanceof ProductInvoiceModel )
            {
                $retval = true;
            }
 
            return boolval( $retval );
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewIdentity(): ?int
        {
            return $this->getModel()->getIdentity();
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function viewIsIdentityNull(): bool
        {
            $retVal = false;

            if( is_null( $this->getModel()->getIdentity() ) == true )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return float|null
         * @throws Exception
         */
        public final function viewTotalPrice(): ?float
        {
            $m = $this->transform();
            return $m->getTotalPrice();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewAddressId(): ?int
        {
            $m = $this->transform();
            return $m->getAddressId();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewMailId(): ?int
        {
            $m = $this->transform();
            return $m->getMailId();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewOwnerNameId(): ?int
        {
            $m = $this->transform();
            return $m->getOwnerNameId();
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final function viewInvoiceRegistered(): ?string
        {
            $m = $this->transform();
            return $m->getRegistered();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewProfileId(): ?int
        {
            $m = $this->transform();
            return $m->getProfileId();
        }


        /**
         * @return ProductInvoiceModel|null
         * @throws Exception
         */
        private function transform(): ?ProductInvoiceModel
        {
            return $this->getModel();
        }
    }
?>