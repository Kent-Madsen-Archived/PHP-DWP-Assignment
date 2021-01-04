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
 
            if( $model instanceof ProductInvoiceController )
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
            return $this->getController()->getModel()->getIdentity();
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function viewIsIdentityNull(): bool
        {
            $retVal = false;

            if( is_null( $this->getController()->getModel()->getIdentity() ) == true )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return float|null
         */
        public final function viewTotalPrice(): ?float
        {
            return $this->getController()->getTotalPrice();
        }


        /**
         * @return int|null
         */
        public final function viewAddressId(): ?int
        {
            return $this->getController()->getAddress();
        }


        /**
         * @return int|null
         */
        public final function viewMailId(): ?int
        {
            return $this->getController()->getMail();
        }


        /**
         * @return int|null
         */
        public final function viewOwnerNameId(): ?int
        {
            return $this->getController()->getOwnerName();
        }


        /**
         * @return string|null
         */
        public final function viewInvoiceRegistered(): ?string
        {
            return $this->getController()->getRegistered();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewProfileId(): ?int
        {
            return $this->getController()->getProfileId();
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