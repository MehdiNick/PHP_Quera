<?php
function getAreaFunctions($shapes){
$SortedFunctions=[];
foreach ($shapes as $shape) {
	switch ($shape) {
		case 'circle':
			$SortedFunctions[]=function ($radius){
	return M_PI*($radius**2);
};
			break;

		case "rectangle":
		$SortedFunctions[]=function ($lenght,$width){
	return $lenght*$width;
};
			break;
		case "triangle":
		$SortedFunctions[]=function ($height,$base){
	return $height*$base*0.5;
};
			break;

		default:
			$SortedFunctions[]=function ($sideLenght){
	return $sideLenght**2;
};
			break;
	}
}
return $SortedFunctions;
}

$functions = getAreaFunctions(['square', 'circle', 'rectangle', 'triangle']);
echo $functions[0](1) . "<br>";
echo $functions[1](2) . "<Br>";
echo $functions[2](2, 4) . "<br>";
echo $functions[3](4, 5);
//var_dump($functions);
//$arra= ["jk"=>"sd"];

//echo $arra["jk"];
//note: we can not call an associative array by a numeric offset

?>