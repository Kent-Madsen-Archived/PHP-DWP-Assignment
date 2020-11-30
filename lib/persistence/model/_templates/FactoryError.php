<?php

    /**
     * Class BaseMVCError
     */
    class FactoryError
    {
        /**
         * FactoryError constructor.
         */
        public function __construct()
        {

        }

        // Variables
        private $message = null;
        private $class_name = null;
        private $line_number = null;


        /**
         * @throws Exception
         */
        public final function load()
        {
            $message = $this->getMessage();
            $class_name = $this->getClassName();
            $at = $this->getLineNumber();

            $full_message = "Factory Error - In class: {$class_name}, At line: {$at}, Occured error: {$message}.";

            throw new Exception( $full_message );
        }


        //

        /**
         * @param string|null $message
         * @return string|null
         */
        public final function setMessage( ?string $message ): ?string
        {
            $this->message = $message;
            return $this->getMessage();
        }


        /**
         * @return string|null
         */
        public final function getMessage(): ?string
        {
            return $this->message;
        }


        /**
         * @return string|null
         */
        public final function getClassName(): ?string
        {
            return $this->class_name;
        }


        /**
         * @param string|null $class_name
         * @return string|null
         */
        public final function setClassName( ?string $class_name ): ?string
        {
            $this->class_name = $class_name;
            return $this->getClassName();
        }


        /**
         * @return int|null
         */
        public final function getLineNumber(): ?int
        {
            return $this->line_number;
        }


        /**
         * @param int|null $line_number
         * @return int|null
         */
        public final function setLineNumber( ?int $line_number ): ?int
        {
            $this->line_number = $line_number;
            return $this->getLineNumber();
        }
    }

?>