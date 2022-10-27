<?php

class Camera{

public int $resolution;
public string $sensor;
public $brand;
private int $minimalFocalLength;

public function GetResolution(){

	return $this->resolution;
}

public function __construct(int $res,string $sensor,string $brand, int $f){

$this->resolution = $res;
$this->sensor = $sensor;
$this->brand = $brand;
$this->minimalFocalLength = $f;


}

}



$NikonD750 = new Camera(24,"CMOS","Nikon",24);


echo $NikonD750->GetResolution();

?>