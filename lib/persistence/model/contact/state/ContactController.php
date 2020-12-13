<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ContactController
     */
    class ContactController
        extends BaseMVCController
    {
        /**
         * @param ContactModel|null $model
         * @throws Exception
         */
        public function __construct( ?ContactModel $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        public function validateModel( $model ): bool
        {
            // TODO: Implement validateModel() method.
            return false;
        }


        /**
         * @param $var
         */
        public function controllerSubject( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerMessage( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerHasBeenSend( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerToMail( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerFrom( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerCreatedOn( $var ): void
        {

        }

        public function getSubject()
        {

        }

        public function getMessage()
        {

        }

        public function getHasBeenSend()
        {

        }

        public function getToMail()
        {

        }

        public function getFrom()
        {

        }

        public function getCreatedOn()
        {

        }
    }
?>