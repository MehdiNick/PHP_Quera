<?php

class PowersOfTwo
{
    private $current = 1;

    public function next()
    {
        $this->current *=2;
        return $this;
    }

    public function get()
    {
return $this->current;    
}

}

?>


