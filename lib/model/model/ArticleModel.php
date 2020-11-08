<?php 

    /**
     * 
     */
    class ArticleModel 
        extends DatabaseModel
            implements ArticleController, 
                       ArticleView
    {
        // Constructors
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }



    }


?>