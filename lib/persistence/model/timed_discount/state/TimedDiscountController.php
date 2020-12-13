<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProfileTypeController
     */
    class TimedDiscountController
        extends BaseMVCController
    {
        /**
         * @param TimedDiscountModel|null $model
         * @throws Exception
         */
        public function __construct( ?TimedDiscountModel $model )
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
        public function controllerContent( $var ): void
        {

        }

        public function getContent()
        {

        }

    }
?>