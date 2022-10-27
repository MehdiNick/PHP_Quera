<?php
class cls{
    public static $jk;
    private  $kj;
    private  $kjj;
    public static function stcfunc1($val){
        self::$jk = $val;
        return new self;
}

    public function stcfunc2($val){
        $this->kj = $val;
        return $this;
    }

    public function stcfunc3($val){
        $this->kjj = $val;
        return $this;
    }
}

$fat = cls::stcfunc1("value1")->stcfunc2("value2")->stcfunc3("value33");


$far = cls::stcfunc1("sss")->stcfunc2("xxx")->stcfunc3("dddd");
var_dump($far);
echo $far::$jk."\n"; // it only gets one value ! the last one! bullshit !
var_dump($fat);
echo"\n".$fat::$jk;
?>