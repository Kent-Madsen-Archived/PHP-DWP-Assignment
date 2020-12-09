<?php
    /**
     *  Title: Domain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Abstract Class
     *  Project: DWP-Assignment
     */

    /**
     * Class Domain
     */
    abstract class Domain
        implements DomainViewInterface,
                   DomainControllerInterface
    {
        // Variables
        private $information = null;

        private $name = null;


        /**
         * @param $info
         * @return bool
         */
        protected function validateInformation( $info ): bool
        {
            $retVal = false;

            if( is_null( $info ) || ( $info instanceof MySQLInformation ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        // Accessor
            // Getter
        /**
         * @return MySQLInformation|null
         */
        final public function getInformation(): ?MySQLInformation
        {
            return $this->information;
        }


            // Setter
        /**
         * @param MySQLInformation|null $var
         * @return MySQLInformation|null
         */
        final public function setInformation( ?MySQLInformation $var ): ?MySQLInformation
        {
            $this->information = $var;
            return $this->getInformation();
        }


        /**
         * @param string $name
         * @return string|null
         */
        protected function setName( string $name ): ?string
        {
            $this->name = $name;
            return $this->getName();
        }


        /**
         * @return string|null
         */
        public final function getName(): ?string
        {
            return $this->name;
        }
    }

?>