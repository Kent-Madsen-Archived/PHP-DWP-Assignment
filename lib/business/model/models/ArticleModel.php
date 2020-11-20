<?php
    /**
     * Class ArticleModel
     */
    class ArticleModel 
        extends DatabaseModel
            implements ArticleController
    {
        // Constructors
        /**
         * ArticleModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        
        // Variables
        private $identity = null;

        private $title      = null;
        private $content    = null;

        private $created_on     = null;
        private $last_updated   = null;


        // implement interfaces
        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerContent( $var )
        {
            // TODO: Implement controllerContent() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerCreatedOn( $var )
        {
            // TODO: Implement controllerCreatedOn() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerLastUpdated( $var )
        {
            // TODO: Implement controllerLastUpdated() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerTitle( $var )
        {
            // TODO: Implement controllerTitle() method.
            return null;
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
        }


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof ArticleFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        // Accessors
            // Getters
        /**
         * @return int|null
         */
        final public function getIdentity()
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return intval( $this->identity, BASE_10 );
        }


        /**
         * @return string|null
         */
        final public function getTitle()
        {
            if( is_null( $this->title ) )
            {
                return null;
            }

            return strval( $this->title );
        }


        /**
         * @return string|null
         */
        final public function getContent()
        {
            if( is_null( $this->content ) )
            {
                return null;
            }

            return strval( $this->content );
        }

        /**
         * @return |null
         */
        final public function getCreatedOn()
        {
            return $this->created_on;
        }


        /**
         * @return |null
         */
        final public function getLastUpdated()
        {
            return $this->last_updated;
        }


            // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !( $this->identityValidation( $value ) ) )
            {
                throw new Exception( 'ArticleModel - setIdentity: null or integer number is allowed' );
            }
            
            $this->identity = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setTitle( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ArticleModel - setTitle: null or string is allowed' );
            }

            $this->title = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setContent( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                 throw new Exception( 'ArticleModel - setContent: null or string is allowed' );
            }

            $this->content = $var;
        }


        /**
         * @param $var
         */
        final public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }


        /**
         * @param $var
         */
        final public function setLastUpdated( $var )
        {
            $this->last_updated = $var;
        }

        /**
         * @param $class
         */
        final public static function implementsView( $class )
        {
            $retVal = false;

            $is_class_object = false;

            if( !is_object( $class ) )
            {
                $is_class_object = true;

            }


            $is_class_implementing_view = false;


            return boolval( $is_class_object && $is_class_implementing_view );
        }

    }

?>