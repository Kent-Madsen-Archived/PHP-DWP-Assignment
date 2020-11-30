<?php
    /**
     *  Title: ContactModelForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ContactModelForm
     */
    class ContactModelForm
            extends DatabaseFormEntity
    {
        /**
         * ContactModelForm constructor.
         */
        public function __construct()
        {
            $this->setIsSet( false );
        }


        // Variables
        private $identity = null;

        private $title = null;
        private $message = null;

        private $hasBeenSend = null;

        private $fromEmail = null;
        private $toEmail = null;

        private $createdOn = null;


        // Accessors
            // Getters
        /**
         * @return null
         */
        final public function getCreatedOn()
        {
            return $this->createdOn;
        }


        /**
         * @return string|null
         */
        final public function getFromEmail(): ?string
        {
            return $this->fromEmail;
        }


        /**
         * @return bool|null
         */
        final public function getHasBeenSend(): ?bool
        {
            return $this->hasBeenSend;
        }


        /**
         * @return int|null
         */
        final public function getIdentity(): ?int
        {
            return $this->identity;
        }


        /**
         * @return string|null
         */
        final public function getMessage(): ?string
        {
            return $this->message;
        }


        /**
         * @return string|null
         */
        final public function getTitle(): ?string
        {
            return $this->title;
        }


        /**
         * @return string|null
         */
        final public function getToEmail(): ?string
        {
            return $this->toEmail;
        }


        // Setters
        /**
         * @param $createdOn
         * @throws Exception
         */
        final public function setCreatedOn( $createdOn ): void
        {
            if( $this->getIsSet() )
            {
                throw new Exception('');
            }

            $this->createdOn = $createdOn;
        }


        /**
         * @param $fromEmail
         * @throws Exception
         */
        final public function setFromEmail( $fromEmail ): void
        {
            if( $this->getIsSet() )
            {
                throw new Exception('');
            }

            $this->fromEmail = $fromEmail;
        }


        /**
         * @param $hasBeenSend
         * @throws Exception
         */
        final public function setHasBeenSend( $hasBeenSend ): void
        {
            if( $this->getIsSet() )
            {
                throw new Exception('');
            }

            $this->hasBeenSend = $hasBeenSend;
        }


        /**
         * @param $identity
         * @throws Exception
         */
        final public function setIdentity( $identity ): void
        {
            if( $this->getIsSet() )
            {
                throw new Exception('');
            }

            $this->identity = $identity;
        }


        /**
         * @param $message
         * @throws Exception
         */
        final public function setMessage( $message ): void
        {
            if( $this->getIsSet() )
            {
                throw new Exception('');
            }

            $this->message = $message;
        }


        /**
         * @param $title
         * @throws Exception
         */
        final public function setTitle( $title ): void
        {
            if( $this->getIsSet() )
            {
                throw new Exception('');
            }

            $this->title = $title;
        }


        /**
         * @param $toEmail
         * @throws Exception
         */
        final public function setToEmail( $toEmail ): void
        {
            if( $this->getIsSet() )
            {
                throw new Exception('');
            }

            $this->toEmail = $toEmail;
        }

    }
?>