<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductController
     */
    class ProductController
        extends BaseMVCController
    {
        /**
         * @param ProductModel|null $model
         * @throws Exception
         */
        public function __construct( ?ProductModel $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        public final function validateModel( $model ): bool
        {
            if($model instanceof ProductModel)
            {
                return true;
            }

            return false;
        }


        /**
         * @param $var
         */
        public function controllerTitle( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerDescription( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerPrice( $var ): void
        {

        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final function getTitle(): ?string
        {
            return $this->getModel()->getTitle();
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function getDescription(): ?string
        {
            return $this->getModel()->getDescription();
        }


        /**
         * @return float|null
         * @throws Exception
         */
        public final function getPrice(): ?float
        {
            return $this->getModel()->getPrice();
        }
    }

?>