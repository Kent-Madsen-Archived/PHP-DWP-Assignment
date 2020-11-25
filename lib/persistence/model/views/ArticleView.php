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
        public function __construct( $model )
        {
            $this->setModel( $model );
        }


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

    }
?>