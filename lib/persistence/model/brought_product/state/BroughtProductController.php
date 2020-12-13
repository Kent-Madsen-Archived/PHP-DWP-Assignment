<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class BroughtProductController
     */
    class BroughtProductController extends BaseMVCController
    {
        /**
         * @param BroughtProductModel|null $model
         * @throws Exception
         */
        public function __construct( ?BroughtProductModel $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        public function validateModel( $model ): bool
        {
            if($model instanceof BroughtProductModel)
            {
                return true;
            }
            return false;
        }


        /**
         * @param $var
         */
        public function controllerInvoice( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerNumberOfProducts( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerPrice( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerProduct( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerRegistered( $var ): void
        {

        }


        /**
         *
         */
        public function getInvoice(): ?int
        {
            return $this->getModel()->getInvoiceId();
        }


        /**
         *
         */
        public function getNumberOfProducts(): ?int
        {
            return $this->getModel()->getNumberOfProducts();
        }


        /**
         *
         */
        public function getPrice(): ?float
        {
            return $this->getModel()->getPrice();
        }


        /**
         *
         */
        public function getProduct(): ?int
        {
            return $this->getModel()->getProductId();
        }


        /**
         *
         */
        public function getRegistered()
        {
            return $this->getModel()->getRegistered();
        }
    }
?>