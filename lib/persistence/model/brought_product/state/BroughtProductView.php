<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class BroughtProductView
     */
    class BroughtProductView
    {
        /**
         * BroughtProductView constructor.
         * @param BroughtProductController|null $controller
         */
        public function __construct( ?BroughtProductController $controller )
        {
            $this->setController( $controller );
        }

        //
        private $controller = null;

        /**
         * @param $model
         * @return bool
         */
        public final function validateModel( $model ): bool
        {
            $retval = false;

            if( $model instanceof BroughtProductModel )
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
            if( is_null( $this->getModel() ) )
            {
                throw new Exception('no instance of a model');
            }

            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getModel()->getIdentity();
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function viewIsIdentityNull(): bool
        {
            $retVal = false;

            if( is_null( $this->getModel() ) )
            {
                throw new Exception('no instance of a model');
            }

            if( is_null( $this->getModel()->getIdentity() ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewInvoiceId(): ?int
        {
            if( is_null( $this->getModel() ) )
            {
                throw new Exception('no instance of a model');
            }

            $m = $this->getModel();
            return $m->getInvoiceId();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewProductId(): ?int
        {
            if( is_null( $this->getModel() ) )
            {
                throw new Exception('no instance of a model');
            }

            $m = $this->getModel();
            return $m->getProductId();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewNumberOfProducts(): ?int
        {
            if( is_null( $this->getModel() ) )
            {
                throw new Exception('no instance of a model' );
            }

            $m = $this->getModel();
            return $m->getNumberOfProducts();
        }


        /**
         * @return float|null
         * @throws Exception
         */
        public final function viewProductPrice(): ?float
        {
            if( is_null( $this->getModel() ) )
            {
                throw new Exception('no instance of a model' );
            }

            $m = $this->getModel();
            return $m->getPrice();
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public final function viewRegistered(): ?string
        {
            if( is_null( $this->getModel() ) )
            {
                throw new Exception('no instance of a model' );
            }

            $m = $this->getModel();
            return $m->getRegistered();
        }

        /**
         * @return BroughtProductController|null
         */
        public function getController(): ?BroughtProductController
        {
            return $this->controller;
        }

        /**
         * @param BroughtProductController|null $controller
         */
        public function setController( ?BroughtProductController $controller ): void
        {
            $this->controller = $controller;
        }

    }
?>