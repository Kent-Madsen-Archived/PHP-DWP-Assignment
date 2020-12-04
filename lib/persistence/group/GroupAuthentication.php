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
         * @return ProfileTypeFactory
         * @throws Exception
         */
        public static final function getProfileTypeFactory(): ProfileTypeFactory
        {
            if( is_null( self::$profileTypeFactory ) )
            {
                self::setProfileTypeFactory( new ProfileTypeFactory( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() )) );
            }

            return self::$profileTypeFactory;
        }


        /**
         * @return ProfileInformationFactory
         * @throws Exception
         */
        public static final function getProfileInformationFactory(): ProfileInformationFactory
        {
            if( is_null( self::$profileInformationFactory ) )
            {
                self::setProfileInformationFactory( new ProfileInformationFactory( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() ) ) );
            }

            return self::$profileInformationFactory;
        }


        /**
         * @return ProfileFactory
         * @throws Exception
         */
        public static final function getProfileFactory(): ProfileFactory
        {
            if( is_null( self::$profileFactory ) )
            {
                self::setProfileFactory( new ProfileFactory( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() ) ) );
            }

            return self::$profileFactory;
        }


        /**
         * @return PersonEmailFactory
         * @throws Exception
         */
        public static final function getPersonEmailFactory(): PersonEmailFactory
        {
            if( is_null( self::$personEmailFactory ) )
            {
                self::setPersonEmailFactory( new PersonEmailFactory( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() ) ) );
            }

            return self::$personEmailFactory;
        }


        /**
         * @return PersonAddressFactory
         * @throws Exception
         */
        public static final function getPersonAddressFactory(): PersonAddressFactory
        {
            if( is_null( self::$personAddressFactory ) )
            {
                self::setPersonAddressFactory( new PersonAddressFactory( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() ) ) );
            }

            return self::$personAddressFactory;
        }


        /**
         * @return PersonNameFactory
         * @throws Exception
         */
        public static final function getPersonNameFactory(): PersonNameFactory
        {
            if( is_null( self::$personNameFactory ) )
            {
                self::setPersonNameFactory( new PersonNameFactory( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() ) ) );
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