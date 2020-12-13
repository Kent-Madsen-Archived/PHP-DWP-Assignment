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
        public function __constructor( ?ProductInvoiceModel $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        public function validateModel( $model ): bool
        {
            // TODO: Implement validateModel() method.
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

        public function getTotalPrice()
        {

        }

        public function getRegistered()
        {

        }

        public function getAddress()
        {

        }

        public function getMail()
        {

        }

        public function getOwnerName()
        {

        }
    }
?>