<?php

    class BasketEntry
    {
        public function __construct( int $id, int $quantity, float $price )
        {
            $this->setProductIdentity( $id );
            $this->setProductQuantity( $quantity );
            $this->setProductPrice( $price );
        }

        private $product_identity = null;
        private $product_quantity = null;
        private $product_price = null;

        public function isIdEqualTo(int $proid): bool
        {
            return $this->getProductIdentity() == $proid;
        }

        //
        /**
         * @return null
         */
        public function getProductPrice()
        {
            return $this->product_price;
        }

        /**
         * @param null $product_price
         */
        public function setProductPrice($product_price): void
        {
            $this->product_price = $product_price;
        }

        /**
         * @return null
         */
        public function getProductIdentity()
        {
            return $this->product_identity;
        }

        /**
         * @return null
         */
        public function getProductQuantity()
        {
            return $this->product_quantity;
        }

        /**
         * @param null $product_identity
         */
        public function setProductIdentity($product_identity): void
        {
            $this->product_identity = $product_identity;
        }

        /**
         * @param null $product_quantity
         */
        public function setProductQuantity($product_quantity): void
        {
            $this->product_quantity = $product_quantity;
        }

        /**
         * @return array
         */
        public static final function convertToArray($id, $quantity, $price)
        {
            return array('product_identity'=>$id, 'product_quantity'=>$quantity, 'product_price'=>$price);
        }

        /**
         * @param $arr
         * @return BasketEntry
         */
        public static function convertToObject($arr)
        {
            return new BasketEntry($arr['product_identity'], $arr['product_quantity'], $arr['product_price']);
        }

        /**
         * @return array
         */
        public function makeArray()
        {
            return self::convertToArray($this->getProductIdentity(), $this->getProductQuantity(), $this->getProductPrice());
        }
    }

?>