<?php
class Foo{
    protected int $x;
    function __construct()
    {
        $this->x=0;
    }

    function getX(){
        return $this->x;
    }
    function __set($name,$value){
        $result=0;

        if($value>=0){
            for($i=0;$i<=1;$i++){
                if($value<1)
                    break;
                $result+=($value%10)*pow(10,$i);

                $value/=10;

            }
            $this->x= $result;
        }else{
            $this->x=-1;
        }
    }
}


$p = new Foo();

echo $p->getX(); // 0

$p->x = 125;
echo $p->getX(); // 25

$p->x = 15874;
echo $p->getX(); // 74

$p->x = 8;
echo $p->getX(); // 8

$p->x = 13;
echo $p->getX(); // 13

$p->x = -15698;
echo $p->getX(); // -1?>