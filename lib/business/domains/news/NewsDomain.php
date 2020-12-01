<?php
    /**
     *  Title: NewsDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class NewsDomain
     */
    class NewsDomain 
        extends Domain
            implements NewsInteraction
    {
        /**
         *
         */
        public const class_name = 'NewsDomain';

        private $article_factory = null;

        /**
         * @return null
         */
        public function getArticleFactory(): ?ArticleFactory
        {
            return $this->article_factory;
        }

        /**
         * @param ArticleFactory|null $article_factory
         */
        public function setArticleFactory(?ArticleFactory $article_factory): void
        {
            $this->article_factory = $article_factory;
        }

        /**
         * NewsDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
            $this->setArticleFactory(new ArticleFactory(new MySQLConnectorWrapper(MySQLInformationSingleton::getSingleton())));
        }


        /**
         * @param $idx
         * @return ArticleModel
         * @throws Exception
         */
        final public function retrieveArticleById( $idx )
        {
            $factory = $this->getArticleFactory();

            $model = new ArticleModel( $factory );
            $model->setIdentity( $idx );

            $factory->readModel($model);

            return $model;
        }


        /**
         * @param $pagination
         * @param $limit
         * @return array|null
         * @throws Exception
         */
        final public function retrieveArticlesAt( int $pagination = 0, int $limit = 5 ): ?array
        {
            $factory = $this->getArticleFactory();

            $factory->setPaginationIndexValue($pagination);
            $factory->setLimitValue($limit);

            return $factory->read();
        }

        /**
         * @return array|null
         * @throws Exception
         */
        final public function retrieveArticles(): ?array
        {
            $factory = $this->getArticleFactory();
            return $factory->read();
        }
    }

?>