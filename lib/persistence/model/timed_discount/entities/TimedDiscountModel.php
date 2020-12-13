<?php

    /**
     * Class ProfileTypeModel
     */
    class TimedDiscountModel
        extends DatabaseModelEntity
    {
        // constructors
        /**
         * TimedDiscountModel constructor.
         * @param TimedDiscountFactory|null $factory
         * @throws Exception
         */
        public function __construct( ?TimedDiscountFactory $factory )
        {
            $this->setFactory( $factory );
        }


        /**
         * @return bool
         */
        final public function requiredFieldsValidated(): bool
        {
            $retVal = false;

            if( !$this->isContentNull() )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        // variables
        private $product_id = null;
        private $discount_begin = null;
        private $discount_end = null;
        private $discount_percentage = null;
        

        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof TimedDiscountFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }

        /**
         * @return null
         */
        public function getDiscountBegin()
        {
            return $this->discount_begin;
        }

        /**
         * @return null
         */
        public function getDiscountEnd()
        {
            return $this->discount_end;
        }

        /**
         * @return null
         */
        public function getDiscountPercentage()
        {
            return $this->discount_percentage;
        }

        /**
         * @return null
         */
        public function getProductId()
        {
            return $this->product_id;
        }

        /**
         * @param null $discount_begin
         */
        public function setDiscountBegin($discount_begin): void
        {
            $this->discount_begin = $discount_begin;
        }


        /**
         * @param null $discount_end
         */
        public function setDiscountEnd($discount_end): void
        {
            $this->discount_end = $discount_end;
        }

        /**
         * @param null $discount_percentage
         */
        public function setDiscountPercentage($discount_percentage): void
        {
            $this->discount_percentage = $discount_percentage;
        }

        /**
         * @param null $product_id
         */
        public function setProductId($product_id): void
        {
            $this->product_id = $product_id;
        }


    }
?>