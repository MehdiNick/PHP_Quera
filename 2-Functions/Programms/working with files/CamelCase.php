<?php

function camelCase(){
	$file_handle = fopen("input.txt","r");
	$string = fgets($file_handle);
	$camelCased = ucwords(strtolower(trim($string)));
	$camelCased = lcfirst($camelCased);
	$camelCased = str_replace(" ", "", $camelCased);
	echo $camelCased;
   }


camelCase();

?>