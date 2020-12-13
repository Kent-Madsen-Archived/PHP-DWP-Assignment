<?php

    abstract class GroupElements
    {
        private static $mysql_wrapper = null;

        private static $page_element_factory = null;

        private static $image_factory = null;
        private static $image_type_factory = null;


        /**
         * @return MySQLConnectorWrapper|null
         * @throws Exception
         */
        protected final static function getMysqlWrapper(): ?MySQLConnectorWrapper
        {
            if( is_null( self::$mysql_wrapper ) )
            {
                self::setMysqlWrapper( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() ) );
            }

            return self::$mysql_wrapper;
        }


        /**
         * @return ImageFactory|null
         * @throws Exception
         */
        public final static function getImageFactory(): ?ImageFactory
        {
            if( is_null( self::$image_factory ) )
            {
                self::setImageFactory( new ImageFactory( self::getMysqlWrapper() ) );
            }

            return self::$image_factory;
        }


        /**
         * @return ImageTypeFactory|null
         * @throws Exception
         */
        public final static function getImageTypeFactory(): ?ImageTypeFactory
        {
            if( is_null( self::$image_type_factory ) )
            {
                self::setImageTypeFactory( new ImageTypeFactory( self::getMysqlWrapper() ) );
            }

            return self::$image_type_factory;
        }


        /**
         * @return PageElementFactory|null
         * @throws Exception
         */
        public final static function getPageElementFactory(): ?PageElementFactory
        {
            if( is_null( self::$page_element_factory ) )
            {
                self::setPageElementFactory( new PageElementFactory( self::getMysqlWrapper() ) );
            }

            return self::$page_element_factory;
        }


        /**
         * @param PageElementFactory|null $page_element_factory
         */
        public final static function setPageElementFactory( ?PageElementFactory $page_element_factory ): void
        {
            self::$page_element_factory = $page_element_factory;
        }


        /**
         * @param ImageFactory|null $image_factory
         * @throws Exception
         */
        public final static function setImageFactory( ?ImageFactory $image_factory ): void
        {
            self::$image_factory = $image_factory;
        }


        /**
         * @param ImageTypeFactory|null $image_type_factory
         * @throws Exception
         */
        public final static function setImageTypeFactory( ?ImageTypeFactory $image_type_factory ): void
        {
            self::$image_type_factory = $image_type_factory;
        }


        /**
         * @param MySQLConnectorWrapper|null $mysql_wrapper
         */
        protected static function setMysqlWrapper( ?MySQLConnectorWrapper $mysql_wrapper ): void
        {
            self::$mysql_wrapper = $mysql_wrapper;
        }

    }
?>