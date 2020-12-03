<?php

    abstract class GroupAuthentication
    {
        private static $mysql_wrapper = null;

        private static $personAddressFactory = null;
        private static $personEmailFactory = null;
        private static $personNameFactory = null;

        private static $profileFactory = null;
        private static $profileInformationFactory = null;
        private static $profileTypeFactory = null;


        /**
         * @return MySQLConnectorWrapper|null
         * @throws Exception
         */
        public static function getMysqlWrapper(): ?MySQLConnectorWrapper
        {
            if( is_null( self::$mysql_wrapper ) )
            {
                self::setMysqlWrapper( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() ) );
            }

            return self::$mysql_wrapper;
        }

        /**
         * @return ProfileTypeFactory|null
         * @throws Exception
         */
        public static final function getProfileTypeFactory(): ?ProfileTypeFactory
        {
            if( is_null( self::$profileTypeFactory ) )
            {
                self::setProfileTypeFactory( new ProfileTypeFactory( self::getMysqlWrapper() ) );
            }

            return self::$profileTypeFactory;
        }


        /**
         * @return ProfileInformationFactory|null
         * @throws Exception
         */
        public static final function getProfileInformationFactory(): ?ProfileInformationFactory
        {
            if( is_null( self::$profileInformationFactory ) )
            {
                self::setProfileInformationFactory( new ProfileInformationFactory( self::getMysqlWrapper() ) );
            }

            return self::$profileInformationFactory;
        }


        /**
         * @return ProfileFactory|null
         * @throws Exception
         */
        public static final function getProfileFactory(): ?ProfileFactory
        {
            if( is_null( self::$profileFactory ) )
            {
                self::setProfileFactory( new ProfileFactory( self::getMysqlWrapper() ) );
            }

            return self::$profileFactory;
        }


        /**
         * @return PersonEmailFactory|null
         * @throws Exception
         */
        public static final function getPersonEmailFactory(): ?PersonEmailFactory
        {
            if( is_null( self::$personEmailFactory ) )
            {
                self::setPersonEmailFactory( new PersonEmailFactory( self::getMysqlWrapper() ) );
            }

            return self::$personEmailFactory;
        }


        /**
         * @return PersonAddressFactory|null
         * @throws Exception
         */
        public static final function getPersonAddressFactory(): ?PersonAddressFactory
        {
            if( is_null( self::$personAddressFactory ) )
            {
                self::setPersonAddressFactory( new PersonAddressFactory( self::getMysqlWrapper() ) );
            }

            return self::$personAddressFactory;
        }


        /**
         * @return PersonNameFactory|null
         * @throws Exception
         */
        public static final function getPersonNameFactory(): ?PersonNameFactory
        {
            if( is_null( self::$personNameFactory ) )
            {
                self::setPersonNameFactory( new PersonNameFactory( self::getMysqlWrapper() ) );
            }

            return self::$personNameFactory;
        }


        /**
         * @param PersonEmailFactory|null $personEmailFactory
         */
        public static final function setPersonEmailFactory( ?PersonEmailFactory $personEmailFactory ): void
        {
            self::$personEmailFactory = $personEmailFactory;
        }

        /**
         * @param PersonAddressFactory|null $personAddressFactory
         */
        public static final function setPersonAddressFactory( ?PersonAddressFactory $personAddressFactory ): void
        {
            self::$personAddressFactory = $personAddressFactory;
        }


        /**
         * @param ProfileTypeFactory|null $profileTypeFactory
         */
        public static final function setProfileTypeFactory( ?ProfileTypeFactory $profileTypeFactory ): void
        {
            self::$profileTypeFactory = $profileTypeFactory;
        }


        /**
         * @param ProfileInformationFactory|null $profileInformationFactory
         */
        public static final function setProfileInformationFactory( ?ProfileInformationFactory $profileInformationFactory ): void
        {
            self::$profileInformationFactory = $profileInformationFactory;
        }


        /**
         * @param ProfileFactory|null $profileFactory
         */
        public static final function setProfileFactory( ?ProfileFactory $profileFactory ): void
        {
            self::$profileFactory = $profileFactory;
        }


        /**
         * @param PersonNameFactory|null $personNameFactory
         */
        public static final function setPersonNameFactory( ?PersonNameFactory $personNameFactory ): void
        {
            self::$personNameFactory = $personNameFactory;
        }


        /**
         * @param MySQLConnectorWrapper|null $mysql_wrapper
         */
        public static final function setMysqlWrapper( ?MySQLConnectorWrapper $mysql_wrapper ): void
        {
            self::$mysql_wrapper = $mysql_wrapper;
        }
    }
?>