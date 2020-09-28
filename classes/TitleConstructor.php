<?php 

class TitleConstructor
{
    function __construct( $baseValue )
    {
        $this->setBase( $baseValue );
    }

    private $base = "";
    private $appendices = array();
    
    function getBase()
    {
        return $this->base;
    }

    function setBase( $base_v )
    {
        $this->base = $base_v;
    }

    function insertAppendice($str)
    {
        array_push($this->appendices, $str);
    }
    
    function getAppendices()
    {
        return $this->appendices;
    }

    function setAppendices( $a )
    {
        $this->appendices = $a;
    }

    function extract_title()
    {
        $current = "";

        $current = $current . $this->getBase();

        foreach( $this->getAppendices() as $value )
        {
            $current = $current . " " . $value;
        }

        return $current;
    }

    function print()
    {
        echo "<title>" . $this->extract_title() . "</title>";
    }
}

?>