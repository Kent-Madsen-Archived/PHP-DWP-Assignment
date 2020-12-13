<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class AssociatedCategoryController
     */
    class AssociatedCategoryController
        extends BaseMVCController
    {
        /**
         * @param $model
         * @throws Exception
         */
        public function __constructor( $model )
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
         * @param int $var
         */
        public function controllerAttribute( int $var ): void
        {

        }


        /**
         * @param int $var
         */
        public function controllerCategory( int $var ): void
        {

        }


        /**
         * @param int $var
         */
        public function controllerProduct( int $var ): void
        {

        }


        /**
         * @return int|null
         */
        public function getAttribute(): ?int
        {

            return 0;
        }


        /**
         * @return int|null
         */
        public function getCategory(): ?int
        {
            return null;
        }


        /**
         * @return int|null
         */
        public function getProduct(): ?int
        {
            return null;
        }
    }
?>