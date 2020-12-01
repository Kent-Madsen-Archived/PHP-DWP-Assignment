<?php
    /**
     *  Title: AuthDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class AuthDomain
     */
    class ProfileDomain
        extends Domain
    {
        public const model_profile_information = 'profile_information_model';
        public const model_profile_type = 'profile_type_model';

        public const model_person_name = 'person_name_model';
        public const model_person_mail = 'person_mail_model';
        public const model_person_address = 'person_address_model';

        public const class_name = "ProfileDomain";

        /**
         * ProfileDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name);
            $this->setInformation( MySQLInformationSingleton::getSingleton() );


            $this->setAddressFactory( new PersonAddressFactory( new MySQLConnectorWrapper($this->getInformation()) ) );
            $this->setEmailFactory( new PersonEmailFactory( new MySQLConnectorWrapper($this->getInformation()) ) );
            $this->setNameFactory( new PersonNameFactory( new MySQLConnectorWrapper($this->getInformation()) ) );

            $this->setProfileFactory( new ProfileFactory( new MySQLConnectorWrapper($this->getInformation()) ) );
            $this->setProfileInformationFactory( new ProfileInformationFactory( new MySQLConnectorWrapper($this->getInformation()) ) );
            $this->setProfileTypeFactory( new ProfileTypeFactory( new MySQLConnectorWrapper($this->getInformation()) ) );
        }


        public function retrieveProfileInformationAt( $profile_idx ): ?ProfileInformationModel
        {
            $factory = $this->getProfileInformationFactory();

            $model = $factory->createModel();
            $model->setProfileId( $profile_idx );
            $factory->readModel($model );

            return $model;
        }

        public function retrieveProfileTypeAt($idx): ?ProfileTypeModel
        {
            $factory = $this->getProfileTypeFactory();
            $model = $factory->createModel();
            $model->setIdentity($idx);
            $factory->readModel($model);

            return $model;
        }

        public function retrieveProfileMailAt($idx): ?PersonEmailModel
        {
            $factory = $this->getEmailFactory();

            $retVal = $factory->createModel();
            $retVal->setIdentity($idx);
            $factory->readModel($retVal);

            return $retVal;
        }

        public function retrieveAddressAt($idx): ?PersonAddressModel
        {
            $retVal = null;
            $factory = $this->getAddressFactory();
            $model = $factory->createModel();
            $model->setIdentity($idx);
            $factory->readModel($model);

            $retVal = $model;
            return $retVal;
        }

        public function retrieveProfileAt($idx): ?ProfileModel
        {
            $factory = $this->getProfileFactory();

            $model = $factory->createModel();
            $model->setIdentity($idx);

            $factory->readModel($model);

            $retVal = $model;
            return $retVal;
        }

        /**
         * @param $idx
         * @return PersonNameFactory|null
         * @throws Exception
         */
        public function retrieveNameAt($idx ): ?PersonNameModel
        {
            $factory = $this->getNameFactory();
            $model = $factory->createModel();
            $model->setIdentity($idx);
            $factory->readModel($model);
            return $model;
        }


        /**
         * @param ProfileInformationModel $info
         * @return array
         * @throws Exception
         */
        public final function expandProfileInformation( ProfileInformationModel $info ): array
        {
            $person_name = null;
            $person_mail = null;
            $person_addr = null;

            $person_name = $this->retrieveNameAt( $info->getPersonNameId() );

            $person_mail = $this->retrieveProfileMailAt( $info->getPersonEmailId() );
            $person_addr = $this->retrieveAddressAt( $info->getPersonAddressId() );

            $retVal = array( self::model_person_name    => $person_name,
                             self::model_person_mail    => $person_mail,
                             self::model_person_address => $person_addr );

            return $retVal;
        }


        /**
         * @param ProfileModel $prof
         * @return array
         */
        public final function expandModelProfile( ProfileModel $prof ): array
        {
            $retVal = null;

            $profile_type_model = $this->retrieveProfileTypeAt( $prof->getProfileType() );
            $profile_information_model = $this->retrieveProfileInformationAt($prof->getIdentity());

            $retVal = array( self::model_profile_type => $profile_type_model,
                             self::model_profile_information => $profile_information_model );

            return $retVal;
        }


        private $addressFactory = null;
        private $emailFactory = null;
        private $nameFactory = null;
        private $profileFactory = null;
        private $profileInformationFactory = null;
        private $profileTypeFactory = null;


        // Accessor
        /**
         * @return ProfileFactory|null
         */
        public final function getProfileFactory(): ?ProfileFactory
        {
            return $this->profileFactory;
        }


        /**
         * @return PersonAddressFactory|null
         */
        public final function getAddressFactory(): ?PersonAddressFactory
        {
            return $this->addressFactory;
        }


        /**
         * @return PersonEmailFactory|null
         */
        public final function getEmailFactory(): ?PersonEmailFactory
        {
            return $this->emailFactory;
        }


        /**
         * @return PersonNameFactory|null
         */
        public final function getNameFactory(): ?PersonNameFactory
        {
            return $this->nameFactory;
        }


        /**
         * @return ProfileInformationFactory|null
         */
        public final function getProfileInformationFactory(): ?ProfileInformationFactory
        {
            return $this->profileInformationFactory;
        }


        /**
         * @return ProfileTypeFactory|null
         */
        public final function getProfileTypeFactory(): ?ProfileTypeFactory
        {
            return $this->profileTypeFactory;
        }


        /**
         * @param PersonAddressFactory|null $addressFactory
         */
        public final function setAddressFactory( ?PersonAddressFactory $addressFactory ): void
        {
            $this->addressFactory = $addressFactory;
        }


        /**
         * @param PersonEmailFactory|null $emailFactory
         */
        public final function setEmailFactory( ?PersonEmailFactory $emailFactory ): void
        {
            $this->emailFactory = $emailFactory;
        }


        /**
         * @param PersonNameFactory|null $nameFactory
         */
        public final function setNameFactory(?PersonNameFactory $nameFactory): void
        {
            $this->nameFactory = $nameFactory;
        }


        /**
         * @param ProfileFactory|null $profileFactory
         */
        public final function setProfileFactory( ?ProfileFactory $profileFactory ): void
        {
            $this->profileFactory = $profileFactory;
        }


        /**
         * @param ProfileInformationFactory|null $profileInformationFactory
         */
        public final function setProfileInformationFactory( ?ProfileInformationFactory $profileInformationFactory ): void
        {
            $this->profileInformationFactory = $profileInformationFactory;
        }


        /**
         * @param ProfileTypeFactory|null $profileTypeFactory
         */
        public final function setProfileTypeFactory( ?ProfileTypeFactory $profileTypeFactory ): void
        {
            $this->profileTypeFactory = $profileTypeFactory;
        }





    }

?>