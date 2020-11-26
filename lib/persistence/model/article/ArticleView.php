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
        extends BaseView
    {
        /**
         * ArticleView constructor.
         * @param $model
         * @throws Exception
         */
        public function __construct( &$model )
        {
            $this->setModel( $model );

            if( $model->isViewNull() )
            {
                $model->setView( $this );
            }
        }


        /**
         * @param $model
         * @return bool
         */
        final public function validateModel( $model ): bool
        {
            $retval = false;

            if( $model instanceof ArticleModelEntity )
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


    }
?>