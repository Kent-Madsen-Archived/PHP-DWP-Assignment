<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ArticleView
     */
    class ArticleView
        extends BaseView
    {
        public function __construct( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
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