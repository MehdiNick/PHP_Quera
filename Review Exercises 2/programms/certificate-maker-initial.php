<?php

function checkName($x)
{
    $pattern = "/[a-zA-Z]{3,15}/";
    if (!is_string($x))
        return false;
    if (strlen($x) < 3 || strlen($x) > 15)
        return false;
    for($i=0; $i<strlen($x); $i++) {
        if (is_numeric($x[$i]))
            return false;
    }
    return true;
}

class Father
{
    public $props = array(
        'firstName'=> null,
        'lastName'=> null,
        'age'=> null,
    );

    public static function firstName($x=null)
    {
        $f = new self();
        if ($x !== null && checkName($x))
            $f->props['firstName'] = $x;
        return $f;
    }
    public function lastName($x=null)
    {
        if ($x !== null && checkName($x))
            $this->props['lastName'] = $x;
        return $this;
    }
    public function age($x=null)
    {
        if ($x !== null&& (int)($x) === $x && $x >= 18 && $x <= 130)
            $this->props['age'] = $x;
        return $this;
    }
    public function toArray()
    {
        $arr = [];
        foreach($this->props as $key => $value) {
            if ($value !== null)
                $arr[$key] = $value;
        }
        return $arr;
    }
}

class Person
{
    public $props = array(
        'firstName'=> null,
        'lastName'=> null,
        'age'=> null,
        'father'=> null,
    );

    public static function firstName($x=null)
    {
        $p = new self();
        if ($x !== null && checkName($x))
            $p->props['firstName'] = $x;
        return $p;
    }
    public function lastName($x=null)
    {
        if ($x !== null && checkName($x))
            $this->props['lastName'] = $x;
        return $this;
    }
    public function age($x=null)
    {
        if ($x !== null&& (int)($x) === $x && $x >= 1 && $x <= 130)
            $this->props['age'] = $x;
        return $this;
    }
    public function setFather($f=null)
    {
        if (
            $f !== null
            && $f instanceof Father
            && $f->props['lastName'] === $this->props['lastName']
            && $f->props['age'] !== null
            && $this->props['age'] !== null
            && $f->props['age'] - $this->props['age'] >= 18
        ) {
            $this->props['father'] = $f;
        }
        return $this;
    }
    public function toArray()
    {
        $arr = [];
        foreach($this->props as $key => $value) {
            if ($key === 'father') {
                if ($value !== null) {
                    $arr[$key] = $value->toArray();
                }
            } else if ($value !== null) {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }
}

function test()
{
//$f = Father::firstName('Esaaro')->lastName('222')->age(40.5)->toArray();
//print_r($f);

    $father = Father::firstName('Esaaro')->lastName('Ozaaraa')->age(42);
    $pa = Person::firstName('ali')->lastName('Ozaaraa')->age(17)->setFather($father)->toArray();
//print_r($pa);

//$fatherObj = Father::firstName('Esaaro')->lastName('Ozaaraa')->age(22);
//$pa = Person::firstName()->lastName('Ozaaraa')->age(20)->setFather($fatherObj)->toArray();

//print_r($pa);
    /* Will output:
    ['firstName' => 'Soobaasaa', 'lastName' => 'Ozaaraa', 'age' => 20]
    */

}

test();
