<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Class ProfileTypeView
     */
    class TimedDiscountView
    {
        /**
         * @param TimedDiscountController|null $controller
         */
        public function __construct( ?TimedDiscountController $controller )
        {
            $this->setController( $controller );
        }

        private $controller =null;

        /**
         * @param TimedDiscountController|null $controller
         */
        public function setController( ?TimedDiscountController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return TimedDiscountController|null
         */
        public function getController(): ?TimedDiscountController
        {
            return $this->controller;
        }


        /**
         * @param $model
         * @return bool
         */
        final public function validateModel( $model ): bool
        {
            $retval = false;
 
            if( $model instanceof ProfileTypeModel )
            {
                $retval = true;
            }

            return boolval( $retval );
        }

        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }
        

    }
?>