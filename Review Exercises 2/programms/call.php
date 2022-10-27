<?php
class MethodOverloading{
	function __Call($name,$argumetns){ 
	//$arguments is an array in which the arguments passed to a function is stored
		// $name is the name of the inaccessible function 

		echo "the fuction $name is invoked now<br>".implode(",",$argumetns);

	}


function nonsense(){
	echo "nonsenseeeeeeee";
}

}

$joo = new MethodOverloading();

$joo->nonsense();

echo "<hr>";

$joo->undefinedFunction("heyy","mehdi","hadi");

?>