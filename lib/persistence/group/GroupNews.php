<?php

    abstract class GroupNews
    {
        private static $article_factory = null;

        /**
         * @param ArticleFactory|null $article_factory
         */
        public final static function setArticleFactory( ?ArticleFactory $article_factory ): void
        {
            self::$article_factory = $article_factory;
        }


        /**
         * @return ArticleFactory|null
         * @throws Exception
         */
        public final static function getArticleFactory(): ?ArticleFactory
        {
            if(is_null(self::$article_factory))
            {
                self::setArticleFactory(
                    new ArticleFactory(
                        new MySQLConnectorWrapper(
                            MySQLInformationSingleton::getSingleton()
                        )
                    )
                );
            }

            return self::$article_factory;
        }

    }

?>