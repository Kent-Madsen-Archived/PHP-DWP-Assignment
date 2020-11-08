<?php 

    class ArticleModel 
        extends DatabaseModel
            implements ArticleController, ArticleView
    {
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }



    }


?>