<?php

class Person{
	private $first_name;
	private $last_name;
	private $age;

	public function setFirstName($fname){
$this->first_name = $fname;

	} 

public function getFirstName(){
	return $this->first_name;
}

	public function setLastName($lname){
$this->last_name = $lname;

	} 

public function getLastName(){
	return $this->last_name;
}

	public function setAge($age){
$this->age = $age;

	} 

public function getAge(){
	return $this->age;
}



 public function sayHello()
    {
        return "Hello!";
    }
}



?>