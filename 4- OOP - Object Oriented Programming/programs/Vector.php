<?php

class Vector
{
    public $x;
    public $y;
    public $z;

    public function __construct($x, $y, $z)
    {
        $this->x=$x;
        $this->y=$y;
        $this->z=$z;
    }

    public function magnitude()
    {
return sqrt(pow($this->x,2)+pow($this->y,2)+pow($this->z,2));  
  }

    public function add($vector)
    {
        $this->x += $vector->x;
         $this->y += $vector->y;
          $this->z += $vector->z;
    }

    public function subtract($vector)
    {
          $this->x -= $vector->x;
         $this->y -= $vector->y;
          $this->z -= $vector->z;
    }

    public function product($n)
    {
         $this->x *= $n;
         $this->y *= $n;
          $this->z *= $n;
    }

    public function dotProduct($vector)
    {
        return ($this->x*$vector->x)+($this->y*$vector->y)+($this->z*$vector->z);
    }

    public function crossProduct($vector)
    {
        $x = ($this->y*$vector->z) - ($this->z*$vector->y) ;
        $y = ($this->z*$vector->x) - ($this->x*$vector->z) ;
        $z = ($this->x*$vector->y) - ($this->y*$vector->x) ;
        return new Vector($x,$y,$z);
    }
}



//$vecotr1 = new Vector(2,5,6);
//$vecotr2 = new Vector(1,2,3);

//$vecotr1->subtract($vecotr2);
//$vecotr1->product(2);
//echo $vecotr1->dotProduct($vecotr2)."<br>";
//var_dump($vecotr1);
//echo $vecotr1->magnitude();

