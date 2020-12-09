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


        /**
         * NewsDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }


        /**
         * @return ArticleFactory|null
         * @throws Exception
         */
        protected final function getArticleFactory(): ?ArticleFactory
        {
            return GroupNews::getArticleFactory();
        }


        /**
         * @param $idx
         * @return ArticleModel
         * @throws Exception
         */
        public final function retrieveArticleById( $idx )
        {
            $factory = $this->getArticleFactory();

            $model = new ArticleModel( $factory );
            $model->setIdentity( $idx );

            $factory->readModel($model);

            return $model;
        }


        /**
         * @param int $pagination
         * @param int $limit
         * @return array|null
         * @throws Exception
         */
        public final function retrieveArticlesAt( int $pagination = 0, int $limit = 5 ): ?array
        {
            $factory = $this->getArticleFactory();

            $factory->setPaginationIndexValue($pagination);
            $factory->setLimitValue($limit);

            return $factory->read();
        }

        /**
         * @param int $pagination
         * @param int $limit
         * @return array|null
         * @throws Exception
         */
        public final function retrieveArticlesOrderedByCreationAt( int $pagination = 0, int $limit = 5 ): ?array
        {
            $factory = $this->getArticleFactory();

            $factory->setPaginationIndexValue($pagination);
            $factory->setLimitValue($limit);

            return $factory->readOrderedByCreationDate();
        }


        /**
         * @return array|null
         * @throws Exception
         */
        public final function retrieveArticles(): ?array
        {
            $factory = $this->getArticleFactory();
            return $factory->read();
        }
    }

?>