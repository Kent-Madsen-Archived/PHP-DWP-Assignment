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

        //
        private static $options = [ 'cost'=>15 ];


        /**
         * @param $profile_idx
         * @return ProfileInformationModel|null
         * @throws Exception
         */
        public final function retrieveProfileInformationAt( int $profile_idx ): ?ProfileInformationModel
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
        public final function retrieveProfileTypeAt( int $idx ): ?ProfileTypeModel
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
        public final function retrieveProfileMailAt( int $idx ): ?PersonEmailModel
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
        public final function retrieveAddressAt( int $idx ): ?PersonAddressModel
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
        public final  function retrieveProfileAt( int $idx ): ?ProfileModel
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
        public final function retrieveNameAt( int $idx ): ?PersonNameModel
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


        /**
         * @param String $mail_content
         * @return PersonEmailModel|null
         * @throws Exception
         */
        public final static function retrieveMailOrCreateModel( String $mail_content ): ?PersonEmailModel
        {
            $factory = GroupAuthentication::getPersonEmailFactory();

            $mailModel = $factory->createModel();
            $mailModel->setContent( $mail_content );

            if( $factory->validateIfMailExist( $mailModel ) )
            {
                $factory->readModelByName( $mailModel );
            }
            else
            {
                $factory->create( $mailModel );
            }

            return $mailModel;
        }


        /**
         * @param string|null $firstname_var
         * @param string|null $lastname_var
         * @param string|null $middle_name_var
         * @return PersonNameModel|null
         * @throws Exception
         */
        public static function createPersonNameModel( string $firstname_var,
                                                      ?string $lastname_var,
                                                      string $middle_name_var ): ?PersonNameModel
        {
            $factory = GroupAuthentication::getPersonNameFactory();
            $nm = $factory->createModel();

            $nm->setFirstName( $firstname_var );
            $nm->setLastName( $lastname_var );
            $nm->setMiddleName( $middle_name_var );

            $factory->create( $nm );

            return $nm;
        }


        /**
         * @param string|null $streetAddressName_var
         * @param int $streetNumber_var
         * @param string|null $country_var
         * @param string|null $street_floor_var
         * @param string|null $zip_code_var
         * @return PersonAddressModel|null
         * @throws Exception
         */
        public static function createPersonAddressModel( string $streetAddressName_var,
                                                         int $streetNumber_var,
                                                         string $country_var,
                                                         string $street_floor_var,
                                                         string $zip_code_var,
                                                         string $city ): ?PersonAddressModel
        {
            $factory = GroupAuthentication::getPersonAddressFactory();
            $am = $factory->createModel();

            $am->setStreetAddressName( $streetAddressName_var );
            $am->setStreetAddressNumber( $streetNumber_var );
            $am->setStreetAddressFloor( $street_floor_var );

            $am->setCountry( $country_var );
            $am->setZipCode( $zip_code_var );
            $am->setCity( $city );

            $factory->create( $am );

            return $am;
        }


        /**
         * @param string|null $birthday_var
         * @param string|null $personPhoneNumber_var
         * @param int $person_addr_id_var
         * @param int $person_name_id_var
         * @param int $person_email_id_var
         * @param int $profile_id_var
         * @return ProfileInformationModel|null
         * @throws Exception
         */
        public static function createProfileInformationModel( ?string $birthday_var,
                                                              ?string $personPhoneNumber_var,
                                                              int $person_addr_id_var,
                                                              int $person_name_id_var,
                                                              int $person_email_id_var,
                                                              int $profile_id_var ): ?ProfileInformationModel
        {
            $pi_factory = GroupAuthentication::getProfileInformationFactory();
            $pim = $pi_factory->createModel();

            $pim->setBirthday( $birthday_var );
            $pim->setPersonPhone( $personPhoneNumber_var );

            $pim->setPersonAddressId( $person_addr_id_var );

            $pim->setPersonNameId( $person_name_id_var );
            $pim->setPersonEmailId( $person_email_id_var );
            $pim->setProfileId( $profile_id_var );

            $pi_factory->create($pim );

            return $pim;
        }

        /**
         * @param string $username_var
         * @param string $password_var
         * @param int $profile_type_id_var
         * @return ProfileModel|null
         * @throws Exception
         */
        public static function createProfile( string $username_var,
                                              string $password_var,
                                              int $profile_type_id_var ): ?ProfileModel
        {
            $profile_factory = GroupAuthentication::getProfileFactory();

            if( self::validateExistenceOfProfile( $username_var ) )
            {
                throw new Exception('Profile already exist');
            }

            $pmd = $profile_factory->createModel();

            $pmd->setUsername( $username_var );
            $pmd->setPassword( self::generatePassword( $password_var ) );

            $pmd->setProfileType( $profile_type_id_var );

            $profile_factory->create( $pmd );

            return $pmd;
        }


        /**
         * @param $input
         * @return string|null
         */
        protected static final function generatePassword( $input ): ?string
        {
            return password_hash( $input, PASSWORD_BCRYPT, self::$options );
        }

        /**
         * @param string $name
         * @return ProfileModel|null
         * @throws Exception
         */
        public static function retrieveProfileByName( string $name ): ?ProfileModel
        {
            $factory = GroupAuthentication::getProfileFactory();
            $m = $factory->readByUsername( $name );

            return $m;
        }


        /**
         * @param string $content
         * @return ProfileTypeModel|null
         * @throws Exception
         */
        public static function retrieveProfileTypeByName( string $content ): ?ProfileTypeModel
        {
            $factory = GroupAuthentication::getProfileTypeFactory();

            $model = $factory->createModel();
            $model->setContent( $content );
            $factory->readModel($model );

            return $model;
        }



        /**
         * @param string $username_var
         * @return bool
         * @throws Exception
         */
        protected static function validateExistenceOfProfile( string $username_var ): bool
        {
            $profile_factory = GroupAuthentication::getProfileFactory();
            $retval = false;

            if( !is_null( $profile_factory->readByUsername( $username_var ) ) )
            {
                $retval = true;
            }

            return $retval;
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