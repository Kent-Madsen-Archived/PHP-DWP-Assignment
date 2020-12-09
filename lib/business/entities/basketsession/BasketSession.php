<?php
    class BasketSession
    {
        /**
         * BasketSession constructor.
         */
        public function __construct()
        {

        }

        /**
         *
         */
        public final function save()
        {
            BasketSessionSingleton::setBasket($this);
        }


        /**
         * @param BasketEntry $obj
         */
        public final function insert( BasketEntry $obj )
        {
            if(is_null($this->entries))
            {
                $this->entries = array();
            }

            $found = false;

            for ( $idx = 0; $idx < count($this->entries); $idx++ )
            {
                $current = $this->entries[$idx];

                if( $current->isIdEqualTo( $obj->getProductIdentity() ) )
                {
                    $found = true;
                    $current->setProductQuantity( $current->getProductQuantity() + $obj->getProductQuantity() );
                }
            }

            if( $found == false )
            {
                $this->append( $obj );
            }
        }

        /**
         * @param BasketEntry|null $obj
         */
        public final function append( ?BasketEntry $obj )
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
        public final function appendArray( $arr )
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

        /**
         * @return bool
         */
        public final function isEntriesNull()
        {
            return is_null($this->entries);
        }

        //
        private $entries = null;

        /**
         * @return array|null
         */
        public final function getEntries(): ?array
        {
            return $this->entries;
        }

        /**
         * @param array|null $entries
         */
        public final function setEntries( ?array $entries ): void
        {
            $this->entries = $entries;
        }

        /**
         * @return array
         */
        public final function makeArray()
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