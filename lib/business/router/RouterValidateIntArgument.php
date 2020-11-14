<?php

class RouterValidateIntArgument
    extends RouterValidateArgument
{
    public function validateArgumentLevel( $arg )
    {


        return false;
    }

    private $level = 0;

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel( $level )
    {
        $this->level = $level;
    }
}

?>