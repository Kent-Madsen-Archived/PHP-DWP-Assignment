<?php
    /**
     *  Title: UserSession
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */
    UserSession::requirements();

    /**
     * Class UserSession
     */
    class UserSession
    {
        private const class_name_variables = "SessionUserSessionVariables";
        private const class_name_controller = "SessionUserSessionController";
        private const class_name_view = "SessionUserSessionView";
        private const class_name_error = "UserSessionErrors";

        /**
         * @throws Exception
         */
        public final static function requirements()
        {
            $cn_var = self::class_name_variables;
            if( !class_exists( $cn_var ) )
            {
                self::throwCantFindClassError( $cn_var );
            }

            $cn_c = self::class_name_controller;
            if( !class_exists( $cn_c ) )
            {
                self::throwCantFindClassError( $cn_c );
            }

            $cn_v = self::class_name_view;
            if( !class_exists($cn_v ) )
            {
                self::throwCantFindClassError( $cn_v );
            }

            $cn_er = self::class_name_error;
            if( !class_exists( $cn_er ) )
            {
                self::throwCantFindClassError( $cn_er );
            }
        }

        private final static function throwCantFindClassError( $value )
        {
            $message = "Can't find the class {$value}";
            throw new Exception($message);
        }


        /**
         * UserSession constructor.
         * @param array $arr
         * @throws Exception
         */
        public function __construct( array $arr )
        {
            if( sizeof( $arr ) == CONSTANT_ZERO )
            {
                UserSessionErrors::throwErrorInputParameterHasNoEntitiesInArray();
            }

            foreach ( $arr as $key => $value )
            {
                if( $key == 'person_data_profile' )
                {
                    if( $value instanceof ProfileModelEntity )
                    {
                        $this->setIdentity( $value->getIdentity() );
                        $this->setUsername( $value->getUsername() );
                        $this->setProfileType( $value->getProfileType() );
                    }
                    else
                    {
                        UserSessionErrors::throwErrorInputParameterIsNotAnInstanceOfProfileModelEntity();
                    }
                }

                if( $key == 'person_entity_identity' )
                {
                    if( !is_int( $value ) )
                    {
                        UserSessionErrors::throwErrorInputParameterIsNotInt();
                    }

                    $this->setIdentity( $value );
                }

                if( $key == 'person_entity_username' )
                {
                    if( !is_string( $value ) )
                    {
                        UserSessionErrors::throwErrorInputParameterIsNotString();
                    }

                    $this->setUsername( $value );
                }

                if( $key == 'person_entity_profile_type' )
                {
                    if( !is_int( $value ) )
                    {
                        UserSessionErrors::throwErrorInputParameterIsNotInt();
                    }

                    $this->setProfileType( $value );
                }
            }
        }

        // Variables
        private $identity = 0;

        private $username       = null;
        private $profile_type   = 0;


        //
        /**
         * @return int|null
         */
        final public function getIdentity(): ?int
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return $this->identity;
        }


        /**
         * @return string|null
         */
        final public function getUsername(): ?string
        {
            if( is_null( $this->username ) )
            {
                return null;
            }

            return $this->username;
        }


        /**
         * @return int|null
         */
        final public function getProfileType(): ?int
        {
            if( is_null( $this->profile_type ) )
            {
                return null;
            }

            return $this->profile_type;
        }


        /**
         * @param int|null $var
         * @return int|null
         */
        final public function setIdentity( ?int $var ): ?int
        {
            $this->identity = $var;

            return $this->getIdentity();
        }


        /**
         * @param string|null $var
         * @return string|null
         */
        final public function setUsername( ?string $var ): ?string
        {
            $this->username = $var;

            return $this->getUsername();
        }


        /**
         * @param int|null $var
         * @return int|null
         */
        final public function setProfileType( ?int $var ): ?int
        {
            $this->profile_type = $var;

            return $this->getProfileType();
        }
    }

?>