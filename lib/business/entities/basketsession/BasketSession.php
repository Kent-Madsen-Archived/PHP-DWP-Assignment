<?php
    class BasketSession
    {
        public function __construct()
        {

        }

        /**
         *
         */
        public function save()
        {
            BasketSessionSingleton::setBasket($this);
        }


        /**
         * @param BasketEntry $obj
         */
        public function append( BasketEntry $obj )
        {
            if( $this->isEntriesNull() )
            {
                $this->setEntries( array() );
            }

            array_push($this->entries, $obj);
        }

        /**
         * @param $arr
         * @throws Exception
         */
        public function appendArray( $arr )
        {
            for($idx = 0; $idx < sizeof($arr); $idx++)
            {
                $current = $arr[$idx];

                if(!$current instanceof BasketEntry)
                {
                    throw new Exception('');
                }

                $this->append( $current );
            }
        }

        public function isEntriesNull()
        {
            return is_null($this->entries);
        }

        //
        private $entries = null;

        /**
         * @return array|null
         */
        public function getEntries(): ?array
        {
            return $this->entries;
        }

        /**
         * @param array|null $entries
         */
        public function setEntries( ?array $entries): void
        {
            $this->entries = $entries;
        }

        /**
         * @return array
         */
        public function makeArray()
        {
            $retVal = array();

            if(is_null($this->entries))
            {
                return array();
            }

            for($idx = 0; $idx < sizeof($this->entries); $idx++)
            {
                $current= $this->entries[$idx];
                array_push($retVal, $current->makeArray());
            }

            return $retVal;
        }
    }
?>