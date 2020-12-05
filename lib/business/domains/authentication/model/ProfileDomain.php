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
        }


        /**
         * @param $profile_idx
         * @return ProfileInformationModel|null
         * @throws Exception
         */
        public final function retrieveProfileInformationAt( $profile_idx ): ?ProfileInformationModel
        {
            $factory = $this->getProfileInformationFactory();

            $model = $factory->createModel();
            $model->setProfileId( $profile_idx );
            $factory->readModel($model );

            return $model;
        }


        /**
         * @param $idx
         * @return ProfileTypeModel|null
         * @throws Exception
         */
        public final function retrieveProfileTypeAt($idx): ?ProfileTypeModel
        {
            $factory = $this->getProfileTypeFactory();
            $model = $factory->createModel();
            $model->setIdentity($idx);
            $factory->readModel($model);

            return $model;
        }


        /**
         * @param $idx
         * @return PersonEmailModel|null
         * @throws Exception
         */
        public final function retrieveProfileMailAt($idx): ?PersonEmailModel
        {
            $factory = $this->getEmailFactory();

            $retVal = $factory->createModel();
            $retVal->setIdentity($idx);
            $factory->readModel($retVal);

            return $retVal;
        }


        /**
         * @param $idx
         * @return PersonAddressModel|null
         * @throws Exception
         */
        public final function retrieveAddressAt($idx): ?PersonAddressModel
        {
            $retVal = null;
            $factory = $this->getAddressFactory();
            $model = $factory->createModel();
            $model->setIdentity($idx);
            $factory->readModel($model);

            $retVal = $model;
            return $retVal;
        }


        /**
         * @param $idx
         * @return ProfileModel|null
         * @throws Exception
         */
        public final  function retrieveProfileAt($idx): ?ProfileModel
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
        public final function retrieveNameAt($idx ): ?PersonNameModel
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
         * @throws Exception
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



        // Accessor
        /**
         * @return ProfileFactory|null
         * @throws Exception
         */
        public final function getProfileFactory(): ?ProfileFactory
        {
            return GroupAuthentication::getProfileFactory();
        }


        /**
         * @return PersonAddressFactory|null
         * @throws Exception
         */
        public final function getAddressFactory(): ?PersonAddressFactory
        {
            return GroupAuthentication::getPersonAddressFactory();
        }


        /**
         * @return PersonEmailFactory|null
         * @throws Exception
         */
        public final function getEmailFactory(): ?PersonEmailFactory
        {
            return GroupAuthentication::getPersonEmailFactory();
        }


        /**
         * @return PersonNameFactory|null
         * @throws Exception
         */
        public final function getNameFactory(): ?PersonNameFactory
        {
            return GroupAuthentication::getPersonNameFactory();
        }


        /**
         * @return ProfileInformationFactory|null
         * @throws Exception
         */
        public final function getProfileInformationFactory(): ?ProfileInformationFactory
        {
            return GroupAuthentication::getProfileInformationFactory();
        }


        /**
         * @return ProfileTypeFactory|null
         * @throws Exception
         */
        public final function getProfileTypeFactory(): ?ProfileTypeFactory
        {
            return GroupAuthentication::getProfileTypeFactory();
        }


    }

?>