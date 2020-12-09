<?php

    class BasketEntry
    {
        /**
         * BasketEntry constructor.
         * @param int $id
         * @param int $quantity
         * @param float $price
         */
        public function __construct( int $id, int $quantity, float $price )
        {
            $this->setProductIdentity( $id );
            $this->setProductQuantity( $quantity );
            $this->setProductPrice( $price );
        }

        private $product_identity = null;
        private $product_quantity = null;
        private $product_price = null;


        /**
         * @param int $proid
         * @return bool
         */
        public function isIdEqualTo( int $proid ): bool
        {
            return $this->getProductIdentity() == $proid;
        }


        //
        /**
         * @return float|null
         */
        public function getProductPrice(): ?float
        {
            return $this->product_price;
        }


        /**
         * @return null
         */
        public final  function getProductIdentity(): ?int
        {
            return $this->product_identity;
        }


        /**
         * @return int
         */
        public final function getProductQuantity(): ?int
        {
            return $this->product_quantity;
        }

        /**
         * @return float|null
         */
        public final function calculateTotalPrice(): ?float
        {
            return $this->getProductQuantity() * $this->getProductPrice();
        }


        /**
         * @param float|null $product_price
         */
        public function setProductPrice(?float $product_price): void
        {
            $this->product_price = $product_price;
        }

        /**
         * @param int|null $product_identity
         */
        public final function setProductIdentity( ?int $product_identity ): void
        {
            $this->product_identity = $product_identity;
        }


        /**
         * @param int|null $product_quantity
         */
        public final function setProductQuantity( ?int $product_quantity ): void
        {
            $this->product_quantity = $product_quantity;
        }


        /**
         * @param $id
         * @param $quantity
         * @param $price
         * @return array
         */
        public static final function convertToArray($id, $quantity, $price): array
        {
            return array('product_identity'=>$id, 'product_quantity'=>$quantity, 'product_price'=>$price);
        }


        /**
         * @param $arr
         * @return BasketEntry
         */
        public static final function convertToObject( $arr ): ?BasketEntry
        {
            return new BasketEntry($arr['product_identity'], $arr['product_quantity'], $arr['product_price']);
        }


        /**
         * @return array
         */
        public final function makeArray(): array
        {
            return self::convertToArray($this->getProductIdentity(), $this->getProductQuantity(), $this->getProductPrice());
        }
    }

?>