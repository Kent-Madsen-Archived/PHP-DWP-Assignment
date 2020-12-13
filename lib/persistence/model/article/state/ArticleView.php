<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ArticleView
     */
    class ArticleView
    {
        /**
         * ArticleView constructor.
         * @param ArticleController $controller
         */
        public function __construct( ArticleController $controller )
        {
            $this->setController( $controller );
        }

        //
        private $controller = null;


        /**
         * @param $model
         * @return bool
         */
        final public function validateModel( $model ): bool
        {
            $retval = false;

            if( $model instanceof ArticleModel )
            {
                $retval = true;
            }

            return boolval( $retval );
        }

        // implement interfaces
        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }

        /**
         * @return ArticleController|null
         */
        public final function getController(): ?ArticleController
        {
            return $this->controller;
        }

        /**
         * @param null $controller
         */
        public final function setController( ?ArticleController $controller ): void
        {
            $this->controller = $controller;
        }


    }
?>